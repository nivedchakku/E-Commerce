<?php
session_start();
include('apps/connect/db.php');
$customer=$_SESSION['USER_ID'];
$date = date('Y/m/d h:i:s', time());
$name=$_POST['username'];	


$r = $db->prepare("select sum(p.price*c.quantity) as amt from product p,cart c where c.p_id=p.id and c.c_id='$customer'");
$r->execute();
$r1 = $r->fetch();
$amt=$r1['amt'];
echo $r1['amt'];

$sql = "insert into orders(c_id,amount,status,date) VALUES 
('$customer','$amt','0','$date')";
$q1 = $db->prepare($sql);
$q1->execute();

$r2 = $db->prepare("SELECT id FROM  orders where id=(SELECT LAST_INSERT_ID());");
$r2->execute();
$row2=$r2->fetch();
$order_id=$row2['id'];

$sql = "insert into payment(order_id,c_id,amount,name,status,date) VALUES 
('$order_id','$customer','$amt','$name','1','$date')";
$q2 = $db->prepare($sql);
$q2->execute();

$r3 = $db->prepare("select c.*,p.price from cart c,product p where p.id=c.p_id and c.c_id='$customer'");
$r3->execute();
for($i=0; $row3 = $r3->fetch(); $i++)
    {
        $p_id=$row3['p_id'];
        $color=$row3['color'];
        $size=$row3['size'];
        $qty=$row3['quantity'];
        $custom_image=$row3['custom_image'];
        $price=$row3['price'];
        $desc=$row3['description'];


        $sql = "insert into ordered_products(order_id,p_id,quantity,price,color,size,description,custom_image,status,date) VALUES 
        ('$order_id','$p_id','$qty','$price','$color','$size','$desc','$custom_image','1','$date')";
        $q3 = $db->prepare($sql);
        $q3->execute();

        $sql = "UPDATE product SET quantity=quantity-1 WHERE id='$p_id'";
        $q4 = $db->prepare($sql);
        $q4->execute();
    }
    $sql = "delete from cart where c_id='$customer'";
        $q4 = $db->prepare($sql);
        $q4->execute();
        header("location:cart.php");




?>