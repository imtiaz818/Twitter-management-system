<?phpsession_start();include 'config/dbconfig.php';     if(isset($_POST['commit']))    {        extract($_POST);                             $sqlQ = mysql_query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'");              $total = mysql_num_rows($sqlQ);               if($total != 0)        {            $getRes = mysql_fetch_assoc($sqlQ);            $_SESSION['id'] = $getRes['id'];                                header("Location:home.php");                 }        else        {            $_SESSION['errorMsg'] = 'Invalid Username or Password';;              header("Location:signin.php");        }    } include 'include/header.php';?>    <div id="contact" class="contact_page">        <div class="container">            <table align="center" style="margin-top: 200px;">                <tr>                    <td style="width: 200px!important">                        <a style="text-decoration: none" href="write-twitte.php">                            <img src="img/letter.png">                            <br/>                            <label class="titleLabel">New Twette</label>                           </a>                    </td>                    <td style="width: 200px!important">                        <a style="text-decoration: none" href="my-twitte.php">                            <img src="img/newlatter.png">                            <br/>                            <label class="titleLabel">List My Twetts</label>                        </a style="text-decoration: none">                    </td>                                                                <td style="width: 200px!important">                        <a style="text-decoration: none" href="all-twittes.php">                            <img src="img/letter.png">                            <br/>                            <label class="titleLabel">All Twette</label>                           </a>                    </td>                    <td style="width: 200px!important">                        <a style="text-decoration: none" href="products.php">                            <img src="img/newlatter.png">                            <br/>                            <label class="titleLabel">Manage Products</label>                        </a style="text-decoration: none">                    </td>                </tr>            </table>        </div>    </div><?php  include 'include/footer.php';?>