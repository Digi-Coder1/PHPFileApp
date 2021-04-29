<!-- Table -->
<div class="bg-light mt-5 table-responsive">
	<table class="table table-hover">
        <thead>
            <tr>
	            <th scope="col">Directory</th>
	            <th scope="col">File Name</th>
	            <th scope="col">File</th>
	            <th scope="col">Size</th>
	            <th scope="col" colspan="5"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $root_folder = dirname(__DIR__) . "/files/";
						$path = $_REQUEST['path'] ?? '';
						$path = url_replace($path);
            $path = $path . '/';
            $pattern = '*';
			if (is_dir($root_folder . $path)) {
				$files_arr = glob($root_folder . $path . $pattern);
				if (!empty($files_arr)) {
					clearstatcache();
					foreach ($files_arr as $file) {
						if (is_file($file)) {
							$directory_root = $file;
            	$directory_name = pathinfo($file)['dirname'];
							$directory_name = explode('/', $directory_name);
							$directory_name = end($directory_name);
            	$file_ext = pathinfo($file)['extension'];
            	$file_name = basename($file, '.' . $file_ext);
            	$file_size = filesize($file);
            	$file_fullname = basename($file);
            	$path = $directory_name . '/' . $file_fullname;
            	$ref_page = 'http://localhost:8080' . $_SERVER["REQUEST_URI"];
		?>
				        <tr class="table-primary">
				            <th scope="row"> <?=ucwords($directory_name);?> </th>
				            <td> <?=ucwords($file_name);?> </td>
				            <td> <?=ucwords($file_fullname);?> </td>
				            <td> <?=$file_size;?> bytes</td>
				            <td><a href="http://localhost:8080/action/delete.php?path=<?=$path;?>&ref_page=<?=$ref_page;?>" class="btn btn-sm btn-danger">Delete</a></td>
				            <td><a href="http://localhost:8080/action/rename.php?path=<?=$path;?>" class="btn btn-sm btn-primary">Rename</a></td>
				            <td><a href="http://localhost:8080/action/write.php?path=<?=$path;?>" class="btn btn-sm btn-success">Edit</a></td>
				            <td><a href="http://localhost:8080/action/read.php?path=<?=$path;?>" class="btn btn-sm btn-secondary">Code</a></td>
				            <td><a href="http://localhost:8080/files/<?=$path;?>" target="_blank" class="btn btn-sm btn-info">View</a></td>
			            </tr>
		<?php
					    }
				    }
				} else {
					echo '<tr><th scope="row" colspan="5"><div class="alert alert-info">Directory {' . $path . '} empty, no files found</div></th></tr>';
				}
			} else {
				echo '<tr><th scope="row" colspan="5"><div class="alert alert-danger">Directory {' . $path . '} not found!</div></th></tr>';
			}

	    ?>
        </tbody>
    </table>
</div>
<!-- End Table -->
