<?php

include "connect.php";
$max =$_POST['maxprice'];
$min = $_POST['minprice'];

   $sql='SELECT * FROM products WHERE product_category !="" AND product_price BETWEEN ? AND ?';

    if(isset($_POST['category'])){
        $category = implode("','",$_POST['category']);
        $sql .=" AND product_category IN('" .$category."') ";
        

    }
    if(isset($_POST['lang'])){
        $lang = implode("','", $_POST['lang']);
        $sql .=" AND lang_used IN('" .$lang."') ";
        
    }
    if(isset($_POST['subcategory'])){
        $product_subcategory= implode("','", $_POST['subcategory']);
        $sql .=" AND product_subcategory IN('" .$product_subcategory."') ";
        
    }

    $result =$db->prepare($sql);
    $result->execute(array($min,$max));
    $output = '';
    $count=$result->rowCount();

    if($count>0){
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $output .=' 
            <div class="popup-view">
                        <div class="popup-view-content">
                            <a  class="close-quick">
                                <i class="fas fa-times-circle"></i>
                            </a>
                            <div>


                            </div>
                        </div>
            </div>
            <div class="product-card">
                       <div class="img-container">
                            <div class="quick-view">
                                <a>
                                    <span>Quick View</span>
                                    <input type="hidden" class="card_id" value="'.$row['product_id'].'">
                                </a>

                            </div>
                            <img src="uploads\Images/'.$row['product_img1'].'" >
                       </div>
                        <div class="card-content">
                            <h3>
                             '.  $row['product_name'].'
                             </h3>
                            <div class="starts">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="price">
                                <p>'. $row['product_price'].'$</p>
                            </div>
                         
                            <div class="card-description ">
                                <ul>
                                   <li> '.   $row['product_category'].'
                                   </li>
                                   <li> '. $row['lang_used'].'</li>
                                   
                                </ul>
                            </div>
                            <div class="card-btn">
                                <button class="chat-btn">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button class="create-btn">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <script src="js/quick-view.js"></script>
            ';

        }
        echo $output;

    }else{
        echo'<h3 align="center"> No Products Founded!!!</h3>';
    }
