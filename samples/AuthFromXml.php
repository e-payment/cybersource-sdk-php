<?php
// This sample demonstrates how to run a sale request, which combines an
// authorization with a capture in one request.

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');
//print_r($referenceCode); exit(0);

$client = new CybsSoapClient($soap_config);
$reply = $client->runTransactionFromFile(__DIR__ . '/xml/auth.xml', $referenceCode);

// This section will show all the reply fields.
echo '<pre>';
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>';
