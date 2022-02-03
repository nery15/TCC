<?php
    if(!isset($_SESSION))
        session_start();
    
    unset($_SESSION['Valid']);
    
    header("location:index.php");
?>
    