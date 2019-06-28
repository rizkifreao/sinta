<?php defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('success')) {
	function success($text) {
		$alert = "
			<div id='notif' class='alert alert-success' role='alert'>
				<span class='mdi mdi-check-all' aria-hidden='true'></span>
				<span class='sr-only'>Sukses:</span>
				$text
			</div>
		";

		return $alert;
	}
}

if (! function_exists('error')) {
	function error($text) {
		$alert = "
			<div id='notif' class='alert alert-error' role='alert'>
				<span class='mdi mdi-close-outline' aria-hidden='true'></span>
				<span class='sr-only'>Error:</span>
				$text
			</div>
		";

		return $alert;
	}
}
