<?php

require_once dirname(__DIR__) . '/includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

$dir_path = dirname(__DIR__) . "/files/";
$path = $_REQUEST['path'] ?? '';
$path = url_replace($path);

if (isset($_REQUEST['write']) && is_file($dir_path . $path)) {
	$content = trim($_REQUEST['file_content']);
	$file_to_write = fopen($dir_path . $_REQUEST['path'], 'w');
	if (fwrite($file_to_write, $content)) {
		$_SESSION['flash_message'] = 'File edited successfully';
		$_SESSION['flash_message_type'] = 'alert-success';
	} else {
		$_SESSION['flash_message'] = 'Failed to edited file';
		$_SESSION['flash_message_type'] = 'alert-danger';
	}

	fclose($file_to_write);

	header('Location: http://localhost:8080/public/files.php?path=' . explode('/', $_REQUEST['path'])[0]);
	exit();
}

define('PAGE_TITLE', 'PHPFileApp');
define('PAGE_LINK_ACTIVE', '');
require_once dirname(__DIR__) . '/core/DemoThemeMethods.php';
require_once dirname(__DIR__) . '/functions/main_func.php';
require_once dirname(__DIR__) . '/includes/header.php';
require_once dirname(__DIR__) . '/includes/write_form.php';
require_once dirname(__DIR__) . '/includes/footer.php';

?>
