<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial_scale=1.0">
  <title>M&#8734M | Sellers</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/nav-bar.css">

  <link rel="stackpath" herf="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<?php include 'includes/connect.php' ?>
<?php include 'includes/navbar.php' ?>
<?php $sellers_data = $db->prepare('SELECT * FROM users');
$sellers_data->execute();
$fetch_seller_data = $sellers_data->fetchAll();
?>

<body>

  <div class="sellers">
    <div class="inner">
      <h1>Sellers</h1>
      <div class="border"></div>

      <div class="row">

        <?php

        foreach ($fetch_seller_data as $data) { ?>
          <div class="col">
            <div class="seller">
              <img src="uploads/Images/<?php echo $data['profile_pic'] ?>" alt="">
              <div class="name"><?php echo $data['first_name'] . ' ' . $data['last_name'] ?></div>
              <div class="country"><?php echo $data['country'] ?></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <p>
                <?php echo $data['bio'] ?>
              </p>
            </div>
          </div>
        <?php }

        ?>
      </div>

    </div>
  </div>

  <?php include 'includes/footer.php' ?>

</body>

</html>