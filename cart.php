
<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" >
        <title>M&#8734M | Cart</title>
        <link rel="stylesheet" href="css/Cart.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="fontawesome\css\fontawesome.min.css">      

    </head>
    <body>
      <?php 
    include 'includes/navbar.php'; 
    include "includes/connect.php";
    ?>

<div class="Cart-main">

    <table class="first-table">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>

        </tr>
        <?php  
        if(isset($_GET['remove'])){
            $id=$_GET['remove'];
            $query = "DELETE FROM cart WHERE product_id = ?";        
            $delete = $db->prepare($query);
            $result = $delete->execute(array($id));
        }

        $connect = $db->prepare('SELECT * FROM cart WHERE user_id=? ');
        $connect->execute([$_SESSION['ID']]);
        if($connect->rowCount()>0){
            while ( $row= $connect->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="<?php echo $row['product_img'];?>" >
                            <div>
                                <h3>   <?php echo $row["product_name"];?></h3>
                                <small> Price: $<span> <?php echo $row["product_price"];?> </span></small>
                                
                                <a href="?remove=<?php echo $row['product_id'];?>"> Remove </a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" class="qty-input" value="<?php echo $row["product_qty"];?>" min="1"></td>
                    <td class="total-row"></td>
                </tr>
                <?php }
        }else{
            echo '<tr>
                    <td class="no-product">there isn\'t any product untill now</td>
                    </tr>';
        }
        ?>
    </table>
    <div class="total">
        <table >
            <tr>
            <td> Subtotal</td>
            <td >$<span class="total-colum"></span></td>
            </tr>
           
            <tr>
                <td> </td>
                <td> <button>Check out</button></td>
            </tr>
            
        </table>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/JQuery3.3.1.js"></script>

<script type="text/javascript" src="js/add-to-cart.js"></script>
<script type="text/javascript" src="js/cart-total-calc.js"></script>

    </body>
</html>










