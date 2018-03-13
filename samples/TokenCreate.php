<?php


// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$billTo = new stdClass();
$billTo->firstName  = 'John';
$billTo->lastName   = 'Doe';
$billTo->street1    = '1295 Charleston Road';
$billTo->city       = 'Mountain View';
$billTo->state      = 'CA';
$billTo->postalCode = '94043';
$billTo->country    = 'US';
$billTo->email      = 'null@cybersource.com';
$billTo->ipAddress  = '10.7.7.7';
$request->billTo    = $billTo;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'THB';
$request->purchaseTotals  = $purchaseTotals;

$card = new stdClass();
$card->accountNumber   = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear  = '2022';
$card->cardType        = '001'; // CardType => https://goo.gl/eoLV7o
$request->card         = $card;

$recurringSubscriptionInfo = new stdClass();
$recurringSubscriptionInfo->frequency = 'on-demand';
$request->recurringSubscriptionInfo = $recurringSubscriptionInfo;
// recurring_frequency, recurring_payment_amount]

$paySubscriptionCreateService = new stdClass();
$paySubscriptionCreateService->run = 'true';
$request->paySubscriptionCreateService = $paySubscriptionCreateService;

$reply = $client->runTransaction($request);

ob_clean();
header("Content-Type: text/plain");

print_r($reply);
echo PHP_EOL;


/*

billTo_firstName=John
billTo_lastName=Doe
billTo_street1=1295 Charleston Road
billTo_city=Mountain View
billTo_state=CA
billTo_postalCode=94043
billTo_country=US
billTo_email=null@cybersource.com

purchaseTotals_currency=USD

card_accountNumber=4111111111111111
card_expirationMonth=12
card_expirationYear=2018
card_cardType=001

merchantID=demoID
merchantReferenceCode=1111

recurringSubscriptionInfo_frequency=on-demand
paySubscriptionCreateService_run=true

*/

// EOF
