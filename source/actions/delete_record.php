<?php
/*
 * Delete a specific record for a domain
 */

if (!isset($adapter)) {
	exit;
}

$dns = new \Cloudflare\API\Endpoints\DNS($adapter);

try {
	if ($dns->deleteRecord($_GET['zoneid'], $_GET['delete'])) {
		echo '<p class="alert alert-success" role="alert">' . l('Success') . '! <a href="?action=zone&domain=' . $_GET['domain'] . '&zoneid=' . $_GET['zoneid'] . '">' . l('Go to console') . '</a></p>';
	} else {
		echo '<p class="alert alert-danger" role="alert">' . l('Failed') . '! <a href="?action=zone&domain=' . $_GET['domain'] . '&zoneid=' . $_GET['zoneid'] . '">' . l('Go to console') . '</a></p>';
	}
} catch (Exception $e) {
	echo '<p class="alert alert-danger" role="alert">' . $e->getMessage() . '</p>';
}
