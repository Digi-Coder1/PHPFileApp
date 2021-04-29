<?php
/**
Session used to display messages after an action is taken.
*/

session_start();

if (isset($_SESSION["flash_message"])) {
?>
<div>
	<div class="alert <?php echo $_SESSION["flash_message_type"]; ?> alert-dismissible fade show" role="alert">
      <?php echo $_SESSION["flash_message"]; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
	unset($_SESSION["flash_message"]);
}

?>
