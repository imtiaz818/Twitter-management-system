<?php
    if(array_key_exists("logout", $_GET)) 
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['oauth_id']);
        unset($_SESSION['fb_423601227719582_code']);
        unset($_SESSION['fb_423601227719582_access_token']);
        unset($_SESSION['fb_423601227719582_user_id']);
        header("location: index.php");
    }
?>
