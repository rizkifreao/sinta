<?php defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('success')) {
	function success($text) {
		$alert = "
		 <script type='text/javascript'>
    		$(document).ready(function () {	
        		toastr.success('".$text."', 'Berhasil');
    		});
    	</script>
		";
		return $alert;
	}
}

if (! function_exists('error')) {
	function error($text) {
		$alert = "
		<script type='text/javascript'>
    		$(document).ready(function () {	
				toastr.error('".$text."', 'Gagal!');
    		});
    	</script>
		";

		return $alert;
	}
}
