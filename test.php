<?php

require_once 'vendor/autoload.php';

use MayMeow\UUID;

$uuidv3 = UUID::v3(UUID::NAMESPACE_DNS, 'test.maymeow.click');
$uuidv4 = UUID::v4();
$uuidv5 = UUID::v5(UUID::NAMESPACE_DNS, 'test.maymeow.click');

//6f9f3758-0a5a-3e4f-b124-95b43c5ff4bf
print_r("Version 3: " . $uuidv3 . "\n");

// random
print_r("Version 4: " . $uuidv4 . "\n");

//454eb932-adf4-52a5-9285-31ccebc92e96
print_r("Version 5: " . $uuidv5 . "\n");

$valid = UUID::is_valid('454eb932-adf4-52a5-9285-31ccebc92e96');
print_r($valid);
