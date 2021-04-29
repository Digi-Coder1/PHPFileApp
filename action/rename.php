<?php

require_once dirname(__DIR__) . '/includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

$dir_path = dirname(__DIR__) . "/files/";
$path = $_REQUEST['path'] ?? '';
$path = url_replace($path);

if (isset($_REQUEST['rename']) && is_dir($dir_path . $path)) {
	$file_name = $_REQUEST["file_name"];
	$dir_name = $file_name . '/';
	$errors = [];

	if (!preg_match('/^[\w]*$/', $file_name)) {
		$errors[] = 'File name should contain only alpha-numeric characters along with underscores';
	}

	if (strlen($file_name) > 20) {
		$errors[] = 'File name must not exceed 20 characters';
	}

	if (file_exists($dir_path . $dir_name)) {
		$errors[] = 'Directory <b>{' . $file_name . '}</b> already exists in this directory';
	}

	if (empty($errors) && !rename($dir_path . $_REQUEST['path'], $dir_path . $dir_name)) {
		$errors[] = 'File <b>{' . $file_name . '}</b> could not be renamed';
	}

	$_SESSION['flash_message'] = empty($errors) ? 'File <b>{' . $file_name . $file_ext . '}</b> was renamed successfully' : $errors[0];
	$_SESSION['flash_message_type'] = empty($errors) ? 'alert-success' : 'alert-danger';
	$location = empty($errors) ? 'http://localhost:8080/public/folders.php' : $_REQUEST['ref_page'];

	header('Location: ' . $location);
	exit();
}

if (isset($_REQUEST['rename']) && is_file($dir_path . $path)) {
	$file_name = $_REQUEST["file_name"];
	$file_ext = '.' . $_REQUEST["file_ext"];
	$dir_name = explode('/', $_REQUEST['path']);
	$dir_name = $dir_name[0] . '/';
	$errors = [];

	if (!preg_match('/^[\w]*$/', $file_name)) {
		$errors[] = 'File name should contain only alpha-numeric characters along with underscores';
	}

	if (strlen($file_name) > 20) {
		$errors[] = 'File name must not exceed 20 characters';
	}

	if (file_exists($dir_path . $dir_name . $file_name . $file_ext)) {
		$errors[] = 'File <b>{' . $file_name . $file_ext . '}</b> already exists in this directory';
	}

	if (empty($errors) && !rename($dir_path . $_REQUEST['path'], $dir_path . $dir_name . $file_name . $file_ext)) {
		$errors[] = 'File <b>{' . $file_name . $file_ext . '}</b> could not be renamed';
	}

	$_SESSION['flash_message'] = empty($errors) ? 'File <b>{' . $file_name . $file_ext . '}</b> was renamed successfully' : $errors[0];
	$_SESSION['flash_message_type'] = empty($errors) ? 'alert-success' : 'alert-danger';
	$location = empty($errors) ? 'http://localhost:8080/public/files.php?path=' . rtrim($dir_name, '/') : $_REQUEST['ref_page'];

	header('Location: ' . $location);
	exit();
}

define('PAGE_TITLE', 'PHPFileApp');
define('PAGE_LINK_ACTIVE', '');
require_once dirname(__DIR__) . '/core/DemoThemeMethods.php';
require_once dirname(__DIR__) . '/functions/main_func.php';
require_once dirname(__DIR__) . '/includes/header.php';
require_once dirname(__DIR__) . '/includes/rename_form.php';
require_once dirname(__DIR__) . '/includes/footer.php';

?>
