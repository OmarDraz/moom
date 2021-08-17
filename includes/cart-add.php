


<?php 
session_start();
include "connect.php";
if(isset($_POST['action'])){

    
    $query = "INSERT INTO cart (product_name, product_price, product_img,user_id) VALUES (?,?,?,?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['name'], $_POST['price'], $_POST['img'], $_SESSION['ID']]);

    $count =$db->query("SELECT * FROM cart");
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}elseif(isset($_POST['data'])){
    $query = "INSERT INTO cart (product_name, product_price, product_img,user_id) VALUES (?,?,?, ?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['single_name'], $_POST['single_price'], $_POST['single_img'],$_SESSION['ID']]);

    $count =$db->query("SELECT * FROM cart");
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}
?>