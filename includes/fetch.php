<?php

    include 'connect.php';
    $data = $db->prepare("SELECT * FROM products WHERE product_name LIKE '%".$_POST["search"]."%'");
    $data->execute();
    $fetch_data = $data->fetchAll();

    foreach($fetch_data as $row){
        ?>
        <div class="card">
            <a href="single-product.php?id=<?php echo $row['product_id'];?>">
                <img src="uploads/Images/<?php echo $row['product_img1'];?>" >
                <p><?php echo $row['product_name'];?></p>
            </a>
        </div>
        <?php
    }

?>