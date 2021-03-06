<html lang="th">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cybersource PHP SDK</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<!-- E8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
<![endif]-->

<style type="text/css">

}

</style>

</head>

<body>

<div class="container">
	<div class="col-sm-8 col-md-8 col-lg-6">
	    <div class="row">
	    	<h1>Cybersource PHP SDK</h1>
		    <h3>Flow</h3>

<pre>
Before State   Perform Action        Change to State
------------   ------------------    ---------------------------------
None           => Authorize          Authorized
               => Sale               Settled

Authorized     => Capture            Settled
               => Reversal           Authorization Reversal

Settled        => Void               Voided Transaction, then Reversal
               => Credit             Credit Transaction (Refund)
               * On Settlement Time  Transmitted

Credit         => Void               Settled
               * On Settlement Time  Refund
</pre>
			<h3>Auth / Capture / Sale / Void / Refund</h3>
			<ul>
				<li><a href="http://apps.cybersource.com/library/documentation/dev_guides/CC_Svcs_SO_API/Credit_Cards_SO_API.pdf" target="_creditCard_SO_API">(PDF) Using Simple Order API</a></li>
		    	<li><a href="AuthFromNameValuePairs.php">AuthFromNameValuePairs</a></li>
		    	<li><a href="Reversal.php">Reversal</a></li>
		    	<li><a href="AuthFromXml.php">AuthFromXml</a></li>
		    	<li><a href="AuthFollowOnCapture.php">Auth Follow On Capture</a></li>
		    	<li><a href="Sale.php">Sale (Auth and Capture)</a></li>
		    	<li><a href="AuthAndReverse.php">Auth And Reverse</a></li>
		    	<li><a href="Credit.php">Credit (Refund)</a></li>
		    	<li><a href="Void.php">Void</a></li>
		    </ul>

		    <h3>Payer Authentication (3-D Secure)</h3>
		    <ul>
		    	<li><a href="http://apps.cybersource.com/library/documentation/dev_guides/Payer_Authentication_SO_API/Payer_Authentication_SO_API.pdf" target="_payerAuthen">(PDF) Using Payer Authentication</a></li>
		    	<li><a href="PayerAuthEnroll.php">PayerAuthEnroll</a></li>
		    	<li>PayerACSResponse</li>
		    	<li>PayerAuthValidate</li>
		    </ul>

		    <h3>Payment Tokenization</h3>
		    <ul>
		    	<li><a href="http://apps.cybersource.com/library/documentation/dev_guides/Payment_Tokenization/SO_API/Payment_Tokenization_SO_API.pdf" target="_paymentToken">(PDF) Using Payment Tokenization</a></li>
		    	<li><a href="TokenCreate.php">Creating a Customer Profile</a></li>
		    	<li><a href="TokenRetrieve.php">Retrieving a Customer Profile</a></li>
		    	<li><a href="TokenPayment.php">Payment Tokenization</a></li>
		    	<li>Updating a Customer Profile</li>
		    	<li><a href="TokenDelete.php">Delete a Customer Profile</a></li>
		    </ul>

		    <h3>Recurring Billing</h3>
		    <ul>
		    	<li><a href="http://apps.cybersource.com/library/documentation/dev_guides/Recurring_Billing/SO_API/Recurring_Billing_SO_API.pdf" target="_recurring">(PDF) Using Recurring Billing</a></li>
		    	<li><a href="Subscription.php">Subscription</a></li>
		    	<li>Creating a Customer Subscription</li>
		    </ul>

		    <h3>Decision Management</h3>
		    <ul>
		    	<li><a href="https://goo.gl/dWMyo3" target="_deviceFingerprint">(Web) What is Device Fingerprint?</a></li>
		    	<li><a href="DeviceFingerprintForm.php">Sale with Device Fingerprint ID</a></li>
		    </ul>
	    </div>
	</div>
</div>

<hr>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

var myobj = jQuery('input.form-control');
myobj.on('keyup keypress blur change input', function() {
	if (this.validity.typeMismatch) {
		this.setCustomValidity( ($(this).data('invalidMessage')) );
	} else {
		this.setCustomValidity('');
	}
});

</script>
</body>
</html>

