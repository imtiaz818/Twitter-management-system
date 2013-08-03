<?php

 session_start();
include 'include/header.php';
include 'config/twitterconfig.php';
require_once('twitteroauth/twitteroauth.php');

$submit = $_POST['submit'];

$submit = $_POST['submit'];
$id = $_REQUEST['id'];
$delete = $_REQUEST['delete'];
$tweete = $_REQUEST['tweete'];
$product_name = $_POST['product_name'];
$product_desc = $_POST['product_desc'];
$price = $_POST['price'];
 $target = "images/"; 
 $target = $target . basename( $_FILES['photo']['name']); 
 
  $pic=$_FILES['photo']['name']; 


if (isset($submit)) {

// here if no ID then adding else we're editing
    if (isset($id)) {

        $sql = "UPDATE products SET product_name='$product_name',product_desc='$product_desc',price='$price',product_img_name='$pic' WHERE id=$id";
        
    } else {
        $sql = "INSERT INTO products (product_name,product_desc,price,product_img_name) VALUES ('$product_name','$product_desc','$price','$pic')";
        
    }
    
     //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
    
// run SQL against the DB
    $result = mysql_query($sql);
  
} elseif (isset($delete)) {
// delete a record
    $sql = "DELETE FROM products WHERE id=$id";
    $result = mysql_query($sql);
  
} elseif (isset($tweete)) {
    
    
    
       $selectProduct = mysql_query("select * from products  WHERE id=$id");

    $selectedProduct = mysql_fetch_assoc($selectProduct);
   

    $content= "Great offer ".$selectedProduct['product_name']. " discounted price ".$selectedProduct['price'];

$user_id =$_SESSION['id'];



	$result =mysql_query("INSERT INTO tweets(twittetext,dtime,userid)VALUES('$content',NOW(),$user_id)");

	

	$tweet = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
	

	$postcontent = $tweet->post('statuses/update', array('status' => $content));

} 
    
    

?>


<br></br><br></br>

<div class="container">

<?php
// this part happens if we don't press submit
// print the list if there is not editing
$result = mysql_query("SELECT * FROM products");
?>

    <div class="row">
        <div class="span12">
            <table class="table table-striped">

                <tbody>



<?php
//lets make a loop and get all news from the database 
while ($myrow = mysql_fetch_assoc($result)) {//begin of loop 
    echo "<tr >";
    //now print the results: 

    echo "<td> <img src='/images/". $myrow['product_img_name'] . "'></td>";
 echo "<td>" . $myrow['product_name'] . "</td>";
    echo "<td>" . $myrow['product_desc'] . "</td>";
    echo "<td>" . $myrow['price'] . "</td>";

    echo "<td> <a href='products.php?id=" . $myrow["id"] . "'\">Edit </a></td>";

    echo "<td> <a href='products.php?id=" . $myrow["id"] . "&delete=yes'\">Delete </a></td>";
    
        echo "<td> <a href='products.php?id=" . $myrow["id"] . "&tweete=yes'\">Tweete </a></td>";
    echo "</tr >";
}//end of loop 
?>




                </tbody>

            </table>

        </div>
    </div>


        <P>
            <a href="newproduct.php">ADD New Product</a>
        <P>
            <?php
            
           if (isset($id)) {   
//               ?>
           
        <form  enctype="multipart/form-data"  method="post" action="products.php">
        <?php
        if (isset($id)) {
// editing so select a record
            $sql = "SELECT * FROM products WHERE id=$id";


            $result = mysql_query($sql);

            $myrow = mysql_fetch_array($result);

            $id = $myrow["id"];
            $product_name = $myrow["product_name"];
            $product_desc = $myrow["product_desc"];
            $price = $myrow["price"];

// print the id for editing
            ?>
                <input type=hidden name="id" value="<?php echo $id ?>">
                <?php
            }
            
            ?>
            Title:
            <textarea name="product_name" cols="50" rows="1"><?php echo $product_name ?></textarea>
            <br>
            Description:
            <textarea name="product_desc" cols="50" rows="5"><?php echo $product_desc ?></textarea>
            <br>
            Price:
            <textarea name="price" cols="50" rows="1"><?php echo $price ?></textarea>
            <br>

             Images : <input type="file" name="photo"><br> 
            <br>
                

            <input type="Submit" name="submit" value="Enter">
        </form>
     
<?php

           }
?>



</div>

</div>

<?php

  include 'include/footer.php';

?>