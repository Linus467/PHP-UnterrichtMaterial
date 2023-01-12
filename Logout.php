<?php
    if(isset($_SESSION["username"])){
        session_unset();
    }
    header("Location:LoginPage.php");
?>