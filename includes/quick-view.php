<?php
include "connect.php";

if( isset($_POST['m'])){
$query = "SELECT * FROM products WHERE product_id =?";
$connect=$db->prepare($query);
$connect->execute(array($_POST['card_id']));
$output=""; 
while($row=$connect->fetch(PDO::FETCH_ASSOC)){
    $user_id = $db->prepare('SELECT user_id FROM products WHERE product_id = ?');
    $user_id->execute(array($_POST['card_id']));
    $user_id_fetch = $user_id->fetch();
  
    $seller = $db->prepare('SELECT U.username FROM users U INNER JOIN products P ON U.user_id = P.user_id WHERE U.user_id = ?');
    $seller->execute(array($user_id_fetch['user_id']));
    $sellerFetch = $seller->fetch();
$output .='
<div class="container"">
    <div class="row">
      <div class="col-md-6">
        <img  style=" width: 335px; height: auto; margin-top: 15px; " src="uploads/Images/'.$row['product_img1'].'">
      </div>
      <div class="col-md-6 ">
        <div class="row ">
          <h2 class="ajax-name"> '. $row['product_name'].'</h2>
        </div>
        <div class="row">
          <h1 class="ajax-price"><i class="fa fa-inr" aria-hidden="true"></i>
           '. $row['product_price'].'
          </h1>
          &nbsp; &nbsp;
          <h3><del>799</del></h3>
          &nbsp; &nbsp;
          <h2 class="text-success">20% off</h2>
        </div>
        
        <div class="row">
          <h4>Size:    &nbsp;</h4>
          54 mb
        </div>
        <div class="row">
          <h4>Languages Used: &nbsp; &nbsp; </h4>
          <a class="btn btn-primary text-light">'. $row['lang_used'] .'</a>
           
        </div>

        <div class="row">
          <h4>Seller: &nbsp; &nbsp;</h4>
          <p style="font-size: 18px">'. $sellerFetch['username'].' </p>
        </div>

        <div class="row">
          <button class="btn btn-primary mr-3 add-to-cart">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          <button class="btn btn-danger">Add To Wishlist <i class="fa fa-heart"></i></button>
        </div>
      </div>
    </div>
  </div> 
';
}
echo $output;

}