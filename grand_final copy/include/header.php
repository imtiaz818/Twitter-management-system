<?php
session_start();

include 'config/dbconfig.php';



$selectUsr = mysql_query("select * from users where id = " . $_SESSION['userid']);

$loginUsrDetail = mysql_fetch_assoc($selectUsr);
?>

<!DOCTYPE html>

<html>

    <head>

        <title>Twitter Management System</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">    

        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">    
            

    </head>

    <body>


        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">

                <div class="container">
                    <!-- .btn-navbar is used as the toggle for collapsible content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a href="home.php" class="brand">
                        Twitter Management System
                    </a>
    <?php
                     if (isset($_SESSION['userid'])) 
		{?>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>
                                <a  href="products.php">
                                    List Products
                                </a>
                            </li>
                            <li>
                                <a  href="all-twittes.php">	
                                    All Tweets
                                </a>
                            </li>


                        </ul>
                    </div>

  <?php

		}  ?>


                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>
                            
                            
                <?php 
                
                if (!isset($_SESSION['userid'])) 
		{
                    ?>

		    <li>
                                <a href="signup.php">
                                    Sign Up							</a>
                            </li>

                            <li>
                                <a href="signin.php">
                                    Sign In							</a>
                            </li>
                            <?php

		} else {
                    ?>
			 
                              <li>
                                  Hi&nbsp;
                                   <?php echo $loginUsrDetail['username']; ?>						
                            </li>
                            <li>
                                <a href=" logout.php?logout" class="login-btn">
                                    Log out						</a>
                            </li>

                          <?php
         		}
		?>
                            


                         


                        </ul>

                    </div><!--/.nav-collapse -->
                </div>	<!-- /.container -->
            </div>	<!-- /.navbar-inner -->
        </div>	<!-- /.navbar -->

