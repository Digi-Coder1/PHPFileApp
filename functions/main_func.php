<?php

/**
object create_nav(string $active_link): used to set links that will be generated by
the DemoThemeMethods class. It takes a string parameter($active_link) used to indicate
an active page.It returns a method(navigation) which is used to generate
the navigation.
*/
function create_nav($active_link) {
	global $dtm;
	$site_url = 'http://localhost:8080/public/';

	$arr = array(
		    array(
		    	'text' => 'Home',
		    	'url' => $site_url . 'index.php'
		    	),
		    array(
		    	'text' => 'Folders',
		    	'url' => $site_url . 'folders.php'
		    	),
		    array(
		    	'text' => 'Files',
		    	'url' => $site_url . 'files.php'
		    	),
		    'Dropdown1' => array(
					    		'title' => 'Action',
						    	array(
						    		'text' => 'Create Directory',
						    		'url' => $site_url . 'create.php?action=dir'
						    		),
						    	array(
						    		'text' => 'Create File',
						    		'url' => $site_url . 'create.php?action=file'
						    		)
						    	)
		);

	return $dtm->navigation($arr, $active_link);
}

?>
