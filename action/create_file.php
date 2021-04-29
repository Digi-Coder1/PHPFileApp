<?php

require_once dirname(__DIR__) . '/includes/session.php';

if ($_REQUEST) {

	$dir_path = dirname(__DIR__) . "/files/";
	$dir_name = $_REQUEST["dir_name"] . '/';
	$file_name = $_REQUEST["file_name"];
	$file_ext = '.' . $_REQUEST["file_ext"];
	$full_path = $dir_path . $dir_name . $file_name . $file_ext;
	$errors = [];
	$msg = '';

	if (!preg_match('/^[\w]*$/', $file_name)) {
		$errors[] = 'File name should contain only alpha-numeric characters along with underscores';
	}

	if (!preg_match('/^[\w]*$/', $_REQUEST["dir_name"])) {
		$errors[] = 'Folder name should contain only alpha-numeric characters along with underscores';
	}

	if (strlen($file_name) > 20) {
		$errors[] = 'File name must not exceed 20 characters';
	}

	if (!file_exists($dir_path . $dir_name)) {
		$errors[] = 'Directory <b>{' . $dir_name . '}</b> does not exists. <br> First create a directory {' . $dir_name . '}';
	}

	if (file_exists($full_path)) {
		$errors[] = 'File <b>{' . $file_name . $file_ext . '}</b> already exists in ' . $_REQUEST["dir_name"] . ' folder';
	}

	if (empty($errors) && !$file = @fopen($full_path, 'w')) {
		$errors[] = 'An error occured while creating File <b>{' . $file_name . $file_ext . '}</b>';
		fclose($file);
	}

	$_SESSION['flash_message'] = empty($errors) ? 'File <b>{' . $file_name . $file_ext . '}</b> was created successfully' : $errors[0];
	$_SESSION['flash_message_type'] = empty($errors) ? 'alert-success' : 'alert-danger';
	$location = empty($errors) ? 'http://localhost:8080/public/files.php?path=' . $_REQUEST["dir_name"] : $_REQUEST['ref_page'];

	header('Location: ' . $location);
	exit();

}

?>
