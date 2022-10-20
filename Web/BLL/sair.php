<?php
session_start();
session_destroy();
unset( $_SESSION );

header("Location: ../UI/index.php");
?>