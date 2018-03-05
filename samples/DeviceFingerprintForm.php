<?php

define('MERCHANT_ID', 'kr950210047');

// DF TEST: 1snn5n9w, LIVE: k8vif92e 
define('DF_ORG_ID', '1snn5n9w');

session_start();

$sess_id  = session_id();
$df_param = 'org_id=' . DF_ORG_ID . '&amp;session_id=' . MERCHANT_ID . $sess_id;
$df_param .= '&amp;t=' . time();

?>

<!-- 

SaleWithDeviceFingerprint.php
SaleWithDeviceFingerprintNVP.php

-->
<form action="SaleWithDeviceFingerprint.php" method="POST">
	<input type="hidden" name="sess_id" value="<?php echo $sess_id ?>" />
	<input type="submit" />
</form>

<!-- DF START -->
session_id: <?php echo $sess_id ?><br/>
device_fingerprint_param: <?php echo $df_param ?><br/>

<p style="background:url(https://h.online-metrix.net/fp/clear.png?<?php echo $df_param ?>&amp;m=1)"></p>
<img src="https://h.online-metrix.net/fp/clear.png?<?php echo $df_param ?>&amp;m=2" width="1" height="1" />

<!-- DF END -->

<pre><?php print_r($_SERVER); ?></pre>
