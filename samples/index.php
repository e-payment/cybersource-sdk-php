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
		    <h3>Auth / Sale / Void / Refund</h3>
		    <ul>
		    	<li><a href="AuthFromNameValuePairs.php">AuthFromNameValuePairs</a></li>
		    	<li><a href="AuthFromXml.php">AuthFromXml</a></li>
		    	<li><a href="AuthFollowOnCapture.php">Auth Follow On Capture</a></li>
		    	<li><a href="Sale.php">Sale (And and Capture)</a></li>
		    	<li><a href="AuthAndReverse.php">Auth And Reverse</a></li>
		    	<li><a href="Credit.php">Credit (Refund)</a></li>
		    </ul>

		    <h3>Payer Authen (3-D Secure)</h3>
		    <ul>
		    	<li><a href="PayerAuthEnroll.php">PayerAuthEnroll</a></li>
		    	<li><a href="PayerAuthValidate.php">PayerAuthValidate</a></li>
		    	<li><a href="ACSResponse.php">ACSResponse</a></li>
		    </ul>

		    <h3>Payment Tokenization</h3>
		    <ul>
		    	<li><a href="PaymentToken.php">PaymentToken</a></li>
		    </ul>

		    <h3>Recurring Billing</h3>
		    <ul>
		    	<li><a href="Subscription.php">Subscription</a></li>
		    </ul>

		    <h3>Decision Management</h3>
		    <ul>
		    	<li><a href="DMAuthWeb.php">DMAuthWeb</a></li>
		    	<li><a href="DMAuthApi.php">DMAuthApi</a></li>
		    	<li><a href="DMAuthNVP.php">DMAuthNVP</a></li>
		    </ul>
	    </div>
	</div>
</div>

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

