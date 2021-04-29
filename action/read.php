<?php

require_once dirname(__DIR__) . '/includes/session.php';
require_once dirname(__DIR__) . '/functions/file_func.php';

if (!isset($_REQUEST['path'])) {
	header('Location: http://localhost:8080/');
	exit();
}

define('PAGE_TITLE', 'PHPFileApp');
define('PAGE_LINK_ACTIVE', '');
require_once dirname(__DIR__) . '/core/DemoThemeMethods.php';
require_once dirname(__DIR__) . '/functions/main_func.php';
require_once dirname(__DIR__) . '/includes/header.php';
require_once dirname(__DIR__) . '/includes/read_table.php';
require_once dirname(__DIR__) . '/includes/footer.php';

?>
