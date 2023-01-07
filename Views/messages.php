<?php
$errors = get_errors();
foreach((array)$errors as $error){ 
?>
    <p><?php print $error; ?></p>
<?php } ?>
<?php
$messages = get_messages();
foreach((array)$messages as $message){ ?>
    <p><?php print $message; ?></p>
<?php } ?>