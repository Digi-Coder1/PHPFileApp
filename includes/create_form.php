<!-- Form -->
    <div class="bg-white p-4 mt-5 mx-auto" style="max-width: 400px;">
        <form class="" action="<?php echo $form_action; ?>" method="">
          <input type="hidden" name="ref_page" value="<?='http://localhost:8080' . $_SERVER["REQUEST_URI"]; ?>">
          <?php if ($show_file_form) : ?>
	        <div class="form-group">
	            <label for="" class="form-label">File Name</label>
	            <input type="text" class="form-control" id="" name="file_name" required="">
	            <div class="">
	            </div>
	        </div>
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
	        <div class="form-group">
	            <label for="" class="form-label">File Directory</label>
	            <select class="form-control" id="" name="dir_name" required="">
	            	<option value selected=""></option>
	            	<?php
		            	$root_folder = dirname(__DIR__) . "/files/";
			            $pattern = $root_folder . '*';
			            $dirs = glob($pattern, GLOB_ONLYDIR);
			            if (!empty($dirs)) {
			            	foreach ($dirs as $dir) {
			            		$folder_name = pathinfo($dir)['basename'];
			        ?>
			                    <option value="<?=$folder_name;?>"> <?=ucwords($folder_name);?> </option>
			        <?php
			            	}
			            }
	            	?>
	            </select>
	            <div class="">
	            </div>
	        </div>
	        <?php endif; ?>

	        <?php if ($show_dir_form) : ?>
	        <div class="form-group">
	            <label for="" class="form-label">File Directory</label>
	            <input type="text" class="form-control" id="" name="dir_name" required="">
	            <div class="">
	            </div>
	        </div>
	        <?php endif; ?>

	        <div class="form-group mt-3">
	            <button class="btn btn-sm btn-success" type="submit">Create</button>
	        </div>
        </form>
    </div>
<!-- End Form -->
