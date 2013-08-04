<?php

 session_start();
include 'include/header.php';

$id = $_REQUEST['id'];


?>
<style type="text/css" media="screen">
  #custom-tweet-button a {
    display: block;
    padding: 2px 5px 2px 20px;
    background: url('https://twitter.com/favicons/favicon.ico') 1px center no-repeat;
    border: 1px solid #ccc;
  }
</style>
    <br><br><br>
        <div class="container">
          
            
            <div class="row-fluid">
                <div class="span2">

</div>
<div class="span8">
    <h2>Product Details</h2>
         <div class="products">
    <?php
 
    
            if (isset($id)) {
// editing so select a record
            $sql = "SELECT * FROM products WHERE id=$id";


            $result = mysql_query($sql);

            $myrow = mysql_fetch_array($result);

            $id = $myrow["id"];
            $product_name = $myrow["product_name"];
            $product_image = $myrow["product_img_name"];
            $product_desc = $myrow["product_desc"];
            $price = $myrow["price"];
            
            			
			echo '<div class="product">'; 
           
			echo '<div class="product-thumb"><img src="images/'.$product_image.'"></div>';
           echo   '<div class="product-content"><h4>'.$product_name.'</h4></div>';
                      
            echo '<div class="product-desc">'.$product_desc.'</div>';
            echo '<div class="product-info">Price '.$price.'</div>';
            echo '</div>';
            $twitte_msg='Great Deal '.$product_name." Price ".$price;
            ?>
             <br><br>
             
             <a href="https://twitter.com/sharee?text=<?php echo urlencode($twitte_msg); ?>&" class="twitter-share-button" data-text="<?php $product_name; ?>" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php
$title=urlencode($product_name);

$summary=urlencode($product_desc);
$image=urlencode("http://www.daddydesign.com/ClientsTemp/Tutorials/custom-iframe-share-button/images/thumbnail.jpg");
?>


<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnaturegardenbuilder.com" target="_blank">
  Share on Facebook
</a>
           
             
                 <?php
            echo '</div>';
          
            }
  
    
    
    ?>
        

    

      

    </div>
        
        
</div>
<div class="span2">

</div>
</div>
            
            
         
        
        
    

<?php

  include 'include/footer.php';

?>