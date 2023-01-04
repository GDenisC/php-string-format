<?php

function format(string $format): null|string {
    $args = func_get_args();

    for ($i = 1; $i < func_num_args(); ++$i) {
        $arg = $args[$i];

        if (!is_string($arg))
            $arg = (string) $arg;

        $pos = strpos($format, "{}");

        if ($pos != 0 && !$pos) {
            return null;
        }

        $format = substr_replace($format, $arg, $pos, 2);
    }

    return $format;
}

function format_array(string $format, mixed $array): null|string {
    if (!preg_match_all("(:\w+)", $format, $matches, PREG_OFFSET_CAPTURE))
        return null;

    $matches = $matches[0];

    foreach ($array as $key => $value) {
        $match = null;

        foreach ($matches as $_match) {
            if ($_match[0] == $key) {
                $match = $_match;
                break;
            }
        }

        if ($match === null) {
            return null;
        }

        $format = substr_replace($format, (string) $value, $match[1], strlen($key));
    }

    return $format;
}

?>