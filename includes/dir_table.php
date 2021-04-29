<!-- Table -->
<div class="bg-light mt-5 table-responsive">
	<table class="table table-hover">
        <thead>
            <tr>
	            <th scope="col">Directory</th>
	            <th scope="col">Real Path</th>
	            <th scope="col">Folder Name</th>
	            <th scope="col">Size</th>
	            <th scope="col">Details</th>
	            <th scope="col" colspan="4"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $root_folder = dirname(__DIR__) . "/files/";
            $pattern = $root_folder . '*';
            $dirs = glob($pattern, GLOB_ONLYDIR);
						$ref_page = 'http://localhost:8080' . $_SERVER["REQUEST_URI"];

            if (empty($dirs)) echo '<tr><th scope="row" colspan="6">No directory found!</th></tr>';

            clearstatcache();
            foreach ($dirs as $dir) {
            	$directory_root = $dir;
            	$directory_name = pathinfo($dir)['dirname'];
							$directory_name = explode('/', $directory_name);
							$directory_name = end($directory_name);
            	$directory_abpath = realpath($dir);
            	$folder_name = pathinfo($dir)['basename'];
            	$folder_size = filesize($dir);
            	$num_folder_dirs = count(glob($dir . '/*', GLOB_ONLYDIR));
            	$num_folder_files = count(glob($dir . '/*.*'));
        ?>
            <tr class="table-warning">
	            <th scope="row"> <?=ucwords($directory_name);?> </th>
	            <td> <?=$directory_abpath;?> </td>
	            <td> <?=ucwords($folder_name);?> </td>
	            <td> <?=$folder_size;?> bytes</td>
	            <td> <?=$num_folder_dirs;?> Folder and <?=$num_folder_files;?> Files </td>
	            <td><a href="http://localhost:8080/action/delete.php?path=<?=$folder_name;?>&ref_page=<?php echo $ref_page; ?>" class="btn btn-sm btn-danger">Delete</a></td>
              <td><a href="http://localhost:8080/action/truncate.php?path=<?=$folder_name;?>&ref_page=<?php echo $ref_page; ?>" class="btn btn-sm btn-secondary">Truncate</a></td>
	            <td><a href="http://localhost:8080/action/rename.php?path=<?=$folder_name;?>&ref_page=<?php echo $ref_page; ?>" class="btn btn-sm btn-primary">Rename</a></td>
	            <td><a href="http://localhost:8080/public/files.php?path=<?=$folder_name;?>" class="btn btn-sm btn-info">view</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
<!-- End Table -->
