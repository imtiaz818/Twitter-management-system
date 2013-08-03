<?php
    session_start();
    


 include 'include/header.php';
  
    if(isset($_SESSION['id'])) 
    {
        header("Location:home.php");
    }
  
   

    

?>
       

<div class="container body"> <!-- Start of Main Container -->
<section id="login">
	<div class="page-header">
		<h4>Log in to your account</h4>
	</div>


<div class="row-fluid">
	<div class="span12">

<form action="home.php" method="post" accept-charset="utf-8" class="form-horizontal" autocomplete="off">
	<div class="control-group ">
		<label class="control-label" for="login_value">Email or Username</label>
		<div class="controls">
			<input class="span6" type="text" name="email" id="login_value" value="" tabindex="1" placeholder="Email" />
		</div>
	</div>

	<div class="control-group ">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input class="span6" type="password" name="password" id="password" value="" tabindex="2" placeholder="Password" />
		</div>
	</div>

		
	
	<div class="control-group">
		<div class="controls">
			<input class="btn btn-primary" type="submit" name="commit" id="submit" value="Let Me In" tabindex="5" />
		</div>
	</div>
</form>
	</div>
</div>


<div class="row-fluid">
	<div class="span12">

	<p style="text-align: center" class="well">
					Don&rsquo;t have an account? <a href="signup.php">Sign up today</a> &nbsp;&nbsp; &#8226; &nbsp;&nbsp;
		
		<a href="reset.php">Forgot Your Password?</a>	</p>

	</div>
</div>

</section>

</div>
<?php

  include 'include/footer.php';

?>
<?php
    unset($_SESSION['errorMsg']);
?>