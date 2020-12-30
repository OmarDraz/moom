<?php session_start() ?>
<!DOCTYPE html >
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial_scale=1.0" >
        <title>M&#8734M | Products</title>
        <link rel="stylesheet" href="css/style-Products.css">
        <link rel="stackpath" herf="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">       
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="products">
<?php
    echo $_SESSION['Username'];
                ?>
        </div>
    </body>
</html>



