<div class="mt-5">
	<div class="mx-auto p-3 text-white" style="max-width: 600px;background-color: grey;">
	<h5 class="text-info">You are viewing source code of: <i> <?=$_REQUEST['path'];?> </i> </h5> <hr><br>
		<?php

		$dir_path = dirname(__DIR__) . "/files/";
		$path = $_REQUEST['path'] ?? '';
		$path = url_replace($path);

		if (is_file($dir_path . $path)) {
			$fhandle = fopen($dir_path . $path, 'r');
			while (!feof($fhandle)) {
				echo nl2br(htmlspecialchars(fgets($fhandle)));
			}
			fclose($fhandle);
		} else {
			echo '<div class="alert alert-danger">File {' . $path . '} not found!</div>';
		}

		?>
	</div>
</div>
