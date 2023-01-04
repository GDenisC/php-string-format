# php-string-format
Better and easy for use string formats
# Examples
```php
<?php

include_once "./format.php";

echo format("Hello, {}! Lorem {}. Number: {}", "World", "ipsum", mt_rand());

echo format_array("Hello, :text! Lorem :ipsum. Number: :num. :unknown", [
    ":text" => "World",
    ":ipsum" => "Ipsum",
    ":num" => mt_rand()
]);

?>
```
