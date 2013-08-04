<?php

    session_start();

    include 'config/dbconfig.php';

    if (!isset($_SESSION['id'])) 

    {

      //  header("location:signin.php");

    }

    $selectUsr = mysql_query("select * from users where id = ".$_SESSION['id']);

    $loginUsrDetail = mysql_fetch_assoc($selectUsr);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Twitter Management System</title>

    <link href="css/bootstrap.css" rel="stylesheet">    
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">    

    <link rel="stylesheet" type="text/css" href="css/theme.css">

</head>

<body>

       <div class="container">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
            
            <li> <?php echo $loginUsrDetail['username']; ?></li>
             
              

            
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="logout.php?logout">Sign Out</a></li>
        </ul>
        <h3 class="muted">Twitter Management System</h3>
      </div>
       </div>

      <hr>

  