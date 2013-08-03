<?php
    session_start();
  
include 'config/dbconfig.php';
    if(isset($_SESSION['id'])) 
    {
        header("location: home.php");
    }
  
    if(isset($_POST['commit']))
    {
        extract($_POST);
        mysql_query("INSERT INTO `users`(email,username,password)VALUES('$emailAdd','$userName','$password')");
        $_SESSION['id'] = mysql_insert_id();
       
        header("Location:home.php");
    }
    include 'include/header.php'; 
?>

    <script>
        function validation(form)
        { 

            var error='';
            if(form.userName.value == "")
            {
                error +="Please Enter User Name \n";
            }
            if(form.emailAdd.value=="")
            {
                error +="Please Enter Email Id \n";
            }
            if(form.emailAdd.value !="" && !(form.emailAdd.value.match(/^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/i)))
            {
                error +="Email Id Is Not Valid \n";
            }
            if(form.password.value=="")
            {
                error+=  "Please Enter Password \n";
            }
            if(form.password.value.length < 4 && form.password.value != "")
            {
                error+=  "Password length must be 5 character\n";
            }
            if(form.repeatPassword.value== "")
            {
                error+=  "Please Enter Repeat Password \n";
            }
            if((form.password.value) != (form.repeatPassword.value))
            {
                error+=  "Password Doesn't Match \n";
            }
            if(error!='')
            {
                alert(error);
                return false;
            }
        }
        function returnObjById(id)
        {
            if (document.getElementById)
                var returnVar = document.getElementById(id);
            else if (document.all)
                var returnVar = document.all[id];
            else if (document.layers)
                var returnVar = document.layers[id];
            return returnVar;
        }
        var xml;
        function cheackEmail(value)
        {
            xml =getXml();
            if(xml==null)
            {
                alert("Your Browser dose not support Ajax");
                return;
            }
            xml.onreadystatechange = getResponce;
            //var current = returnObjById("hdnUserId").value;
            var url="validateEmail.php?value="+value;
            xml.open('GET',url,true);
            xml.send(null);
        }
        function getResponce()
        {
            if(xml.readyState == 4)
            {
                var responceMessage = xml.responseText;  
                
                if(responceMessage == "")
                { 
                    returnObjById("emailAdd").style.borderColor = "#DBDBDB #EAEAEA #EAEAEA #DBDBDB";  
                    returnObjById("buttonRestict").disabled = false; 
                }
                else
                { 
                    alert("Sorry this email belongs to an existing account.");
                    returnObjById("emailAdd").style.borderColor = "#FF2222";    
                    returnObjById("buttonRestict").disabled = true;    
                }
            }
        }
        function getXml()
        {
            if(window.XMLHttpRequest)
            {
                return new XMLHttpRequest();
            }
            else if(window.ActiveXObject)
            {
                return new ActiveXObject('Mcrosoft.XMLHTTP');
            }
            return null;
        }
    </script>
    <br><br><br>
    
<div class="container body narrow-body"> <!-- Start of Main Container -->

<section id="register">
	<div class="page-header">
		<h1>Registration...</h1>
	</div>

   
<div class="row-fluid">
	<div class="span12">
          <form name="form" action="signup.php" method="post" class="form-horizontal" onsubmit="return validation(this)">   
               
                    <div class="control-group ">
		<label class="control-label required" for="username">Username</label>
		<div class="controls">
			<input class="span6" type="text" name="userName" id="username" value="" placeholder="userName" />
		</div>
	</div>
                
              
              
            
                
                        <div class="control-group ">
		<label class="control-label required" for="username">Email Address </label>
		<div class="controls">
                      <input  class="span6" name="emailAdd" id="emailAdd" type="text" placeholder="Your Name" value="" onchange="return cheackEmail(this.value)"/>
			
		</div>
	</div>
                
                
          
                
                
                <div class="control-group ">
		<label class="control-label required" for="username">Password</label>
		<div class="controls">
                    <input class="span6" type="password" name="password" id="password" value="" placeholder="password" />
			
		</div>
	</div>
                
                
               
		<div class="control-group ">
			<label class="control-label required" for="pass_confirm">Password (again)</label>
			<div class="controls">
				<input class="span6" type="password" name="repeatPassword" id="pass_confirm" value="" placeholder="Password (again)" />
			</div>
		</div>

                <div class="control-group">
		<div class="controls">
			<input class="btn btn-primary" type="submit" name="commit" id="submit" value="Sign up"  />
		</div>
	</div>

                
                        
</form>
            
            <p style="text-align: center">
	Already registered? <a href="signin.php">Sign In</a></p>
        </div>
</div>
    
    
</section>
</div>   
    

<?php

  include 'include/footer.php';

?>