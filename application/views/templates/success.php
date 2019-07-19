<div class="w3-container w3-success w3-center w3-padding-16">
    <?php if(!isset($message)) $message = "Success!"; echo $message; ?>
    <div class="w3-center w3-padding-16"><a href="<?php if(!isset($return_path)) $return_path = $base_url; echo $return_path; ?>" class="w3-btn w3-theme w3-medium" title="">Okay</a></div>
</div>