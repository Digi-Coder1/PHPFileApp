<?php

require_once dirname(__DIR__) . '/includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

$dir_path = dirname(__DIR__) . "/files/";
$path = $_REQUEST['path'] ?? '';
$path = url_replace($path);
$ref_page = $_REQUEST['ref_page'] ?? 'http://localhost:8080/public/folders.php';

clearstatcache();

if ($_REQUEST && is_dir($dir_path . $path)) {
	$dir = $dir_path . $path . '/';
	$files = glob($dir . '*');

	if (!empty($files)) {
		foreach ($files as $file) {
			if (is_file($file)) {
				$arr[] = unlink($file) ? ['msg' => 'All Files in {' . $path . '} deleted','msg_type' => 'alert-success'] : ['msg' => 'Files(some files) in {' . $path . '} could not be deleted','msg_type' => 'alert-danger'];
			}
		}

		$_SESSION['flash_message'] = $arr[0]['msg'];
	    $_SESSION['flash_message_type'] = $arr[0]['msg_type'];
	}

	header('Location: ' . $ref_page);
	exit();
}

$_SESSION['flash_message'] = 'The page you seek cannot be accessed';
$_SESSION['flash_message_type'] = 'alert-danger';
header('Location: http://localhost:8080/public/?error=1');

?>
