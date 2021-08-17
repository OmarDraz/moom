<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
}
include "includes/connect.php";

include 'includes/navbar.php';

?>
<!DOCTYPE html>
<html>
<div class="mainBody">
    <a class="filter-icon">
        <i class="fas fa-filter"></i>
    </a>

    <div class="left-side" id="popup-filter">
        <div class="filter">
            <a class="closebutton">
                <i class="fas fa-times"></i>
            </a>
            <div class="filter-container">

                <h4>Type</h4>
                <span class="button"> <img src="uploads\Images\Expend-arrow.png" alt=""></span>
                <div class="search-options">
                    <input type="search" id="search-input" placeholder="Search">
                    <ul id="chosen-filter">
                        <?php
                        $connect = $db->query('SELECT DISTINCt product_category FROM products ');
                        while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <li>
                                <label>
                                    <input type="checkbox" class="chkbox category" value="<?php echo $row['product_category'] ?>" id="<?php echo $row['product_category'] ?>">&nbsp;<?php echo $row['product_category'] ?>
                                </label>
                            </li>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="filter-container">
                <h4>categories</h4>
                <span class="button"> <img src="uploads\Images\Expend-arrow.png" alt=""></span>
                <div class="search-options">
                    <input type="search" id="search-input" placeholder="Seach">
                    <ul id="chosen-filter">
                        <?php
                        $connect = $db->query('SELECT subcategory_name FROM subcategories ');
                        while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <li><label><input type="checkbox" class="chkbox subcategory" <?php if (strtolower($row['subcategory_name']) == $_GET['category']) echo 'checked'; ?> value="<?php echo $row['subcategory_name'] ?>">&nbsp;<?php echo $row['subcategory_name'] ?></label></li>

                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="filter-container">
                <h4>Language</h4>
                <span class="button"> <img src="uploads\Images\Expend-arrow.png" alt=""></span>
                <div class="search-options">
                    <input type="search" id="search-input" placeholder="Seach">
                    <ul id="chosen-filter">
                        <?php
                        $connect = $db->query('SELECT DISTINCt lang_used FROM products ');
                        while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <li><label><input type="checkbox" class="chkbox lang" value="<?php echo $row['lang_used'] ?>">&nbsp;<?php echo $row['lang_used'] ?></label></li>

                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="filter-container price_range">
                <?php
                $max_price = $db->prepare('SELECT MAX(product_price) AS max_price FROM products');
                $max_price->execute();
                $fetch_max_price = $max_price->fetch();
                $maxnum = $fetch_max_price['max_price'];
                $minnum = 0;
                ?>
                <h4> Select price range<h4>

                        <div class="price-container">
                            <div class="input_fields">
                                <input type="number" id="minnum_range" min=0 value="<?php echo $minnum; ?>">
                                <input type="number" id="maxnum_range" min=0 value="<?php echo $maxnum; ?>">
                            </div>
                            <div class="chkbox price-div">apply</div>
                        </div>
            </div>

        </div>
    </div>

    <div class="right-side">
        <!-- -------------------------------quick-view-popup------------------------ -->
        <h1 class="section-title"> Products</h1>
        <!-- view-display -->
        <div class="view">
            <span>View :</span>
            <span class="span1"> <i class="fas fa-th-large moree active-view"></i> </span>
            <span class="span2"><i class="fas fa-th largee"></i></span>

        </div>

        <ul id="selected-filter">
        </ul>


        <div class="loader">
            <img src="img/loader.gif">
        </div>
        <div class="product-container">



            <?php
            if (isset($_GET['category'])) {

                $query = 'SELECT * FROM products WHERE product_subcategory = ?';
                $connect = $db->prepare($query);
                $connect->execute(array(strtolower($_GET['category'])));
                if($connect->rowCount()>0){
                while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {

            ?>
                    <!-- this is quick view html -->
                    <div class="popup-view">
                        <div class="popup-view-content">
                            <a href="" class="close-quick">
                                <i class="fas fa-times-circle"></i>
                            </a>
                            <div>


                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="img-container">
                            <div class="quick-view">
                                <a href="">
                                    <span>Quick View</span>
                                    <input type="hidden" class="card_id" value="<?php echo $row['product_id'] ?>">
                                </a>
                            </div>
                            <img src="uploads\Images\<?php echo $row['product_img1']; ?>">
                        </div>
                        <div class="card-content">
                            <h3>
                                <?php
                                if (isset($row['product_name'])) {
                                    echo $row['product_name'];
                                } else {
                                    echo 'product name';
                                }
                                ?>
                            </h3>
                            <div class="starts">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="price">
                                <p><?php echo $row['product_price']; ?>$</p>
                            </div>

                            <div class="card-description ">
                                <ul>
                                    <li> <?php if (isset($row['product_category'])) {
                                                echo $row['product_category'];
                                            } ?>
                                    </li>
                                    <li> <?php if (isset($row['lang_used'])) {
                                                echo $row['lang_used'];
                                            } elseif ($row['lang_used'] === "") {
                                            }
                                            ?></li>


                                </ul>
                            </div>
                            <div class="card-btn">
                                <button class="chat-btn">
                                    add to wishList&nbsp;<i class="fa fa-heart"></i>
                                </button>
                                <button class="create-btn" name="submit">
                                    add to cart&nbsp;<i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </a>
                <?php
                }
            }else{
                echo'<h3 align="center"> No Products Founded!!!</h3>';
            }
                
            } else {
                $query = 'SELECT * FROM products';
                $connect = $db->prepare($query);
                $connect->execute();
                while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <!-- this is quick view html -->
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
                                <a href="">
                                    <span>Quick View</span>
                                    <input type="hidden" class="card_id" value="<?php echo $row['product_id'] ?>">
                                </a>

                            </div>

                            <img src="uploads\Images\<?php echo $row['product_img1']; ?>">
                        </div>
                        <div class="card-content">
                            <h3>
                                <?php
                                if (isset($row['product_name'])) {
                                    echo '<a href="single-product.php?id=' . $row['product_id'] . '">' . $row['product_name'] . '</a>';
                                } else {
                                    echo 'product name';
                                }
                                ?>
                            </h3>
                            <div class="starts">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="price">
                                <p><?php echo $row['product_price']; ?>$</p>
                            </div>

                            <div class="card-description ">
                                <ul>
                                    <li> <?php if (isset($row['product_category'])) {
                                                echo $row['product_category'];
                                            } ?>
                                    </li>
                                    <li> <?php if (isset($row['lang_used'])) {
                                                echo $row['lang_used'];
                                            } elseif ($row['lang_used'] === "") {
                                            }
                                            ?></li>


                                </ul>
                            </div>
                            <div class="card-btn">
                                <button class="chat-btn">
                                    add to wishList&nbsp;<i class="fa fa-heart"></i>
                                </button>
                                <button class="create-btn" name="submit">
                                    add to cart&nbsp;<i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>










        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/JQuery3.3.1.js"></script>

<script src="js/filter-ajax.js"></script>

<script src="js/quick-view.js">
</script>
<script src="js/script.js">


</script>

<script type="text/javascript" src="js/add-to-cart.js"></script>


<?php include 'includes/footer.php'; ?>


</body>

</html>