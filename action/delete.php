<?php

require_once dirname(__DIR__) . '/includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

$dir_path = dirname(__DIR__) . "/files/";
$path = $_REQUEST['path'] ?? '';
$path = url_replace($path);
$ref_page = $_REQUEST['ref_page'] ?? 'http://localhost:8080/public/folders.php';


clearstatcache();

if ($_REQUEST && is_dir($dir_path . $path)) {
	$dir = $dir_path . $path;
	$dir_name = basename($dir);

	$arr_success = [
		'msg' => 'Directory <b>{' . $dir_name . '}</b> deleted successfully',
		'msg_type' => 'alert-success'
	];
	$arr_error = [
		'msg' => 'Directory <b>{' . $dir_name . '}</b> could not be deleted! <br> Tip: Make sure directory is empty before deleting',
		'msg_type' => 'alert-danger'
	];

	$arr[] = rmdir($dir) ? $arr_success : $arr_error;

	$_SESSION['flash_message'] = $arr[0]['msg'];
	$_SESSION['flash_message_type'] = $arr[0]['msg_type'];
	header('Location: ' . $ref_page);
	exit();
}

if ($_REQUEST && is_file($dir_path . $path)) {
	$file = $dir_path . $path;
	$file_name = basename($file);

	$arr_success = [
		'msg' => 'File {' . $file_name . '} deleted successfully',
		'msg_type' => 'alert-success'
	];
	$arr_error = [
		'msg' => 'File {' . $file_name . '} could not be deleted!',
		'msg_type' => 'alert-danger'
	];

	$arr[] = unlink($file) ? $arr_success : $arr_error;

	$_SESSION['flash_message'] = $arr[0]['msg'];
	$_SESSION['flash_message_type'] = $arr[0]['msg_type'];

	header('Location: ' . $ref_page);
	exit();
}

$_SESSION['flash_message'] = 'The page you seek cannot be accessed';
$_SESSION['flash_message_type'] = 'alert-danger';
header('Location: http://localhost:8080/public/?error=1');

?>
