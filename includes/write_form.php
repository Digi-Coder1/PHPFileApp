<?php

$path = $_REQUEST['path'] ?? '';
$ref_page = 'http://localhost' . $_SERVER["REQUEST_URI"];

?>
<!-- Form -->
    <div class="bg-white p-4 mt-5 mx-auto" style="max-width: 400px;">
        <?php if (empty($path) || !is_file($dir_path . $path)): ?>
        	<p class="alert alert-danger"> File <b><?=$path;?></b> was not found</p>
        <?php else: ?>	
        <h3>Editing <i class="text-success"> <?=basename($dir_path . $path);?> </i> </h3>	
        <form class="" action="" method="">
            <input type="hidden" name="path" value="<?=$path;?>">
            <input type="hidden" name="ref_page" value="<?=$ref_page;?>">
	        <div class="form-group">
	            <label for="" class="form-label">Insert Content</label>
	            <textarea class="form-control" id="" name="file_content" required="" style="height: 300px;resize: none;"><?php
	                $file_to_read = fopen($dir_path . $path, 'r+');
	                while (!feof($file_to_read)) {
	                	echo htmlspecialchars(fgets($file_to_read));
	                }
	                fclose($file_to_read);
	            ?></textarea>
	            <div class="">
	            </div>
	        </div>
	        <div class="form-group mt-3">
	            <button class="btn btn-sm btn-success" type="submit" name="write">Save</button>
	        </div>
        </form>
        <?php endif; ?>
    </div>
<!-- End Form -->
