<?php
    session_start();
    include 'config/dbconfig.php';

    $emailValue=$_GET['value'];
   
    if($emailValue != "")
    {
        
        $sql= "SELECT COUNT(*) as total FROM `users` WHERE `email`='$emailValue'";
        $result=mysql_query($sql) or die(mysql_error());
        $getTotolRecord = mysql_fetch_assoc($result);
        
        if($getTotolRecord['total'] != '0' && $getTotolRecord['total'] != '')
        {
            echo "<p style='background:#FFBFBF; 
            border:thin #FF2222 solid; 
            color:#FF2222; 
            font-size:13px; 
            text-align:center;
            padding-top:3px;
            padding-bottom:3px;
            text-align: center;
    width: 100%;margin-top:5px;'>"."Sorry, ".$_GET['value']." belongs to an existing account...!"."</p>";
        }
    }
?>