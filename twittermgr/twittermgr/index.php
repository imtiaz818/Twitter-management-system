<?php
    session_start();
    if(isset($_SESSION['id'])) 
    {
        header("Location:home.php");
    }



 include 'include/header.php';
    

?>
        
    
        <br><br><br>
        <div class="container">
          
            
            <div class="row-fluid">
                <div class="span2">

</div>
<div class="span8">
    <h2>Products</h2>
         <div class="products">
    <?php
 
    
    $results = mysql_query("SELECT * FROM products ORDER BY id ASC "); 


			
    if ($results) { 
        //output results from database
 while($obj = mysql_fetch_assoc($results)) 
                {
      
			
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj["product_img_name"].'"></div>';
            echo '<div class="product-content"><h3>'.$obj["product_name"].'</h3>';
            echo '<div class="product-desc">'.$obj["product_desc"].'</div>';
            echo '<div class="product-info">Price '.$currency.$obj["price"].'</div>';
            echo '</div>';
            echo '<input type="hidden" name="product_code" value="'.$obj["product_code"].'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
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