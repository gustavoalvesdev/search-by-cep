<?php 

require_once 'vendor/autoload.php';

use \Gustavoalvesdev\SearchByCEP\Search;

$search = new Search();

$result = $search->getAddressFromZipCode('01001000'); 

print_r($result);
