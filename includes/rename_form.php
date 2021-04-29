<?php

$path = $_REQUEST['path'] ?? '';
$ref_page = 'http://localhost:8080' . $_SERVER["REQUEST_URI"];

?>
<!-- Form -->
    <div class="bg-white p-4 mt-5 mx-auto" style="max-width: 400px;">
        <?php if (empty($path) || !file_exists($dir_path . $path)): ?>
        	<p class="alert alert-danger"> File <b><?=$path;?></b> was not found</p>
        <?php else: ?>
        <h3>Rename <i class="text-success"> <?=basename($dir_path . $path);?> </i> </h3>
        <form class="" action="" method="">
            <input type="hidden" name="path" value="<?=$path;?>">
            <input type="hidden" name="ref_page" value="<?=$ref_page;?>">
	        <div class="form-group">
	            <label for="" class="form-label">File Name</label>
	            <input type="text" class="form-control" id="" name="file_name" required="">
	            <div class="">
	            </div>
	        </div>
	        <?php if (is_file($dir_path . $path)): ?>
	        <div class="form-group">
	        	<label for="" class="form-label">File Type</label>
	        	<select class="form-control" id="" name="file_ext" required="">
	        	    <option value selected=""></option>
	        		<option value="txt">Text File</option>
	        		<option value="php">PHP File</option>
	        		<option value="js">Javascript File</option>
	        		<option value="css">CSS File</option>
	        		<option value="html">HTML File</option>
	        	</select>
	        	<div class=""></div>
	        </div>
	        <?php endif; ?>
	        <div class="form-group mt-3">
	            <button class="btn btn-sm btn-success" type="submit" name="rename">Rename</button>
	        </div>
        </form>
        <?php endif; ?>
    </div>
<!-- End Form -->
