<?php

require_once '../includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

if (!isset($_REQUEST['path'])) {
	header('Location: folders.php');
	exit();
}

define('PAGE_TITLE', 'PHPFileApp | Files');
define('PAGE_LINK_ACTIVE', 'Files');
require_once '../core/DemoThemeMethods.php';
require_once '../functions/main_func.php';
require_once '../includes/header.php';
require_once '../includes/file_table.php';
require_once '../includes/footer.php';

?>
