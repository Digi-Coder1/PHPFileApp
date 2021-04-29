<?php

require_once '../includes/session.php';

define('PAGE_TITLE', 'PHPFileApp | Create');
define('PAGE_LINK_ACTIVE', 'Create');

require_once '../core/DemoThemeMethods.php';
require_once '../functions/main_func.php';
require_once '../includes/header.php';


$action = $_GET['action'] ?? '';
$redirect = $_GET['redirect'] ?? 'index.php';

$form_action = '';
$show_dir_form = false;
$show_file_form = false;

switch ($action) {
	case 'dir':
		$form_action = 'http://localhost:8080/action/create_dir.php';
		$show_dir_form = true;
		break;
	case 'file':
		$form_action = 'http://localhost:8080/action/create_file.php';
		$show_file_form = true;
		break;

	default:
		header('Location: ' . $redirect);
		exit();
		break;
}

require_once '../includes/create_form.php';

require_once '../includes/footer.php';

?>
