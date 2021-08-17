<?php session_start();
include "includes/connect.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial_scale=1.0">
    <title>M&#8734M | Products</title>
    <link rel="stylesheet" href="css/Products.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome\css\fontawesome.min.css">
</head>
<script type="text/javascript" src="js/JQuery3.3.1.js"></script>

<input type="checkbox" class="checkbox" id="checkid">
<div class="poup-background">&nbsp;</div>
<div class="nav-container">
  <ul class="popup-menu">
    <li><a href="Products.php?category=ecommerce">E-Commerce</a></li>
    <li><a href="Products.php?category=freelancing">Freelancing</a></li>
    <li><a href="Products.php?category=education">Education</a></li>
    <li><a href="Products.php?category=small-shops">Small Shops</a></li>
    <li><a href="Products.php?category=companies-systems">Companies Systems</a></li>
    <li><a href="Products.php?category=crms">CRMs</a></li>
    <li><a href="Products.php?category=chatting-apps">Chatting Apps</a></li>
    <li><a href="Products.php?category=portofolios">Portofolios</a></li>
  </ul>
</div>
<nav>

  <div class="top">

    <label for="checkid" class="menu"><i class="fas fa-bars"></i></label>
    <a href="/moom/"><img src="uploads/Images/logo.png" alt="Logo|M&#8734M "></a>
    <form class="input-search">
      <input type="search" name="search_text" id="search_text" class="search" placeholder="Search Here ...">
      <i class="fa fa-search"></i>

    </form>
    <ul class="nav-icons">
      <li class="search-icon"> <a><i class="fa fa-search"></i></a></li>
      <li class="icon-none"><a href=""><i class="fa fa-heart"></i></a></li>
      <li>
        <a href="./cart.php">
          <i class="fa fa-shopping-cart"></i>
          <span></span>
        </a>
      </li>
      <li class="icon-none"> <a href="<?php echo 'profile.php?id=' . $_SESSION['ID'] ?>"><i class="fa fa-user"></i></a></li>
      <li class="sign-out"><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>

  <div class="results">

  </div>
  <style>

.results {
    position: fixed;
    margin: 0px auto;
    transition: .5s ease;
    left: 0;
    z-index: 88;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.2);
    overflow-x:scroll ;
    padding: 20px 200px ;
    z-index:9999999999 ;

  }
  
  
.results .card{
    color: #fff;
    display: inline-block;
    background-color: #fff;
    box-shadow: 2px 5px 5px rgb(255, 255, 255,0.4);
    width: 350px;
    height: 300px;
    margin: 10px;
    border-radius: 10px;
    overflow: hidden;


}
  .results .card p{
      color: #000;
      text-align: center;
      height: 10%;
  }
  
.results .card img{
    width: 100%;
    height: 90%;
}
  .results h3 {
    padding: 15px;
  }
  @media (max-width: 1000px){
    .results{
    margin-top: 20px;
    }
  }

  </style>
  
  <div class="bottom">
    <ul class="category-menu">
      <li><a href="Products.php?category=ecommerce">E-Commerce</a></li>
      <li><a href="Products.php?category=freelancing">Freelancing</a></li>
      <li><a href="Products.php?category=education">Education</a></li>
      <li><a href="Products.php?category=small-shops">Small Shops</a></li>
      <li><a href="Products.php?category=companies-systems">Companies Systems</a></li>
      <li><a href="Products.php?category=crms">CRMs</a></li>
      <li><a href="Products.php?category=chatting-apps">Chatting Apps</a></li>
      <li><a href="Products.php?category=portofolios">Portofolios</a></li>
    </ul>
  </div>
</nav>
<script>
  $('.results').hide();
  $(document).ready(function() {
    $('#search_text').keyup(function() {
      var txt = $(this).val();
      if (txt != '') {
        $.ajax({
          url: "includes/fetch.php",
          method: "post",
          data: {
            search: txt
          },
          dataType: "text",
          success: function(data) {
            $('.results').html(data);
  $('.results').show();

          }
        });
      } else {
        $('.results').html('');
  $('.results').hide();

      }
    });
  });
</script>