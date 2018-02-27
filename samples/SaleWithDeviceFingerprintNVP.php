<?php
// This sample demonstrates how to run an auth request for two items with a flat
// name-value pair structure

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsNameValuePairClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsNameValuePairClient($soap_config);

$request = array();
$request['ccAuthService_run']       = 'true';
$request['merchantReferenceCode']   = $referenceCode;
$request['billTo_firstName']        = 'Jane';
$request['billTo_lastName']         = 'Smith';
$request['billTo_street1']          = '1295 Charleston Road';
$request['billTo_city']             = 'Mountain View';
$request['billTo_state']            = 'CA';
$request['billTo_postalCode']       = '94043';
$request['billTo_country']          = 'US';
$request['billTo_email']            = 'jsmith@example.com';
$request['card_accountNumber']      = '4111111111111111';
$request['card_expirationMonth']    = '12';
$request['card_expirationYear']     = '2019';
$request['purchaseTotals_currency'] = 'USD';
$request['item_0_unitPrice']        = '12.34';
$request['item_1_unitPrice']        = '56.78';

$request['merchantID']              = 'kr950210047';
$request['afsService_run']          = 'true';
$request['deviceFingerprintID']     = @$_POST['sess_id'];
//print_r($request); exit(0);

$reply = $client->runTransaction($request);

echo '<pre>';

print("\nREQUEST: " . print_r($request, true));
echo PHP_EOL;

echo 'RESPONSE: ' . PHP_EOL;
print_r($reply);
echo '</pre>' . PHP_EOL;
