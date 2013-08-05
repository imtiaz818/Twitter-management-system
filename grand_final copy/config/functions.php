<?php
    require 'dbconfig.php';
    class User 
    {
        function checkUser($uid, $oauth_provider, $username,$email,$gender) 
        {
            $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());
            $result = mysql_fetch_array($query);
            if (!empty($result)) 
            {
                # User is already present
            } 
            else 
            {
                $query = mysql_query("INSERT INTO `users`(oauth_provider, oauth_uid, username,email, gender) VALUES ('$oauth_provider', $uid, '$username','$email','$gender')") or die(mysql_error());
                $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
                $result = mysql_fetch_array($query);
                return $result;
            }
            return $result;
        }
    }
?>
