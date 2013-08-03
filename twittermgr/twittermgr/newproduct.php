<?php

 session_start();
 include 'include/header.php';
      
?>

<br></br><br></br>

<div class="container">



    <div class="row">
        <div class="span12">
  
        <form  enctype="multipart/form-data"  method="post" action="products.php">
       
      
            Title:
            <textarea name="product_name" cols="50" rows="1"></textarea>
            <br>
            Description:
            <textarea name="product_desc" cols="50" rows="5"></textarea>
            <br>
            Price:
            <textarea name="price" cols="50" rows="1"></textarea>
            <br>
            Images : <input type="file" name="photo"><br> 
            <br>
                
            <input type="Submit" name="submit" value="Enter">
        </form>
     




</div>

</div>
    <?php

  include 'include/footer.php';

?>