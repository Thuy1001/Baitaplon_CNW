<?php include 'config.php'?>

<link rel="stylesheet" href="carts1.php">
<?php


 $sql="SELECT*FROM products WHERE pro_id = $pro_id";
 //$sql="SELECT p.pro_title, p.price, p.feature_image, o.pro_qty from products p, orders o 
 //inner join orders o on p.pro_id = o.pro_id and pro_id= $pro_id ";

 $result = mysqli_query($conn,$sql); 
 //var_dump($result);exit;
 $product_cart= array();
 foreach($result as $value){
     $product_cart[$value["pro_id"]]=$value;
 }

if(isset($_POST["add-to-cart"])){
            if(!isset($_SESSION["cart"])|| $_SESSION["cart"]==null){
                $product_cart[$pro_id]["pro_qty"] = 1;
                $_SESSION["cart"][$pro_id]=$product_cart[$pro_id];
                //var_dump($_SESSION["cart"][$pro_id]);
                
            }else{
                if(array_key_exists($pro_id,$_SESSION["cart"])){
                    $_SESSION["cart"][$pro_id]["pro_qty"] += 1; 

                }else{
                    $product_cart[$pro_id]["pro_qty"] = 1;
                    $_SESSION["cart"][$pro_id]=$product_cart[$pro_id];
                }
            }
               // echo"<pre>";
                //print_r($_SESSION["cart"]);  
               // header("Location:carts1.php");
        
        }
?>