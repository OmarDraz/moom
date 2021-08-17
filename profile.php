<?php
include('includes/connect.php');
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
}
$userSession   = $_SESSION['Username'];
$enteredID     = $_GET['id'];
$user_info     = $db->prepare('SELECT * FROM users WHERE user_id = ?');
$user_info->execute(array($enteredID));
$fetchUserInfo = $user_info->fetch();

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $pname         = $_POST['product-name'];
                                        $pprice        = $_POST['product-price'];
                                        $mainCategory  = $_POST['category'];
                                        $subCate       = $_POST['sub_category'];
                                        $pDescription  = $_POST['product-description'];
                                        $pplang        = $_POST['product-program-lang'];
                                        $pimg1         = $_POST['product-img1'];
                                        $pimg2         = $_POST['product-img2'];
                                        $pimg3         = $_POST['product-img3'];
                                        $pimg4         = $_POST['product-img4'];
                                        $pvid          = $_POST['product-vid'];


                                        $pimg1_filename = $_FILES['product-img1']['name'];
                                        $pimg2_filename = $_FILES['product-img2']['name'];
                                        $pimg3_filename = $_FILES['product-img3']['name'];
                                        $pimg4_filename = $_FILES['product-img4']['name'];
                                        $pvid_filename  = $_FILES['product-vid']['name'];

                                        move_uploaded_file($_FILES['product-img1']['tmp_name'], "uploads/images/" . $pimg1_filename);
                                        move_uploaded_file($_FILES['product-img2']['tmp_name'], "uploads/images/" . $pimg2_filename);
                                        move_uploaded_file($_FILES['product-img3']['tmp_name'], "uploads/images/" . $pimg3_filename);
                                        move_uploaded_file($_FILES['product-img4']['tmp_name'], "uploads/images/" . $pimg4_filename);
                                        move_uploaded_file($_FILES['product-vid']['tmp_name'],  "uploads/videos/" . $pvid_filename);

                                        $getUserId = $db->prepare('SELECT user_id FROM users WHERE username = ? limit 1');
                                        $getUserId->execute(array($userSession));
                                        $user_id = $getUserId->fetch(PDO::FETCH_ASSOC);

                                        $inserting = $db->prepare('INSERT INTO products(product_name,
                                                                                    product_category,
                                                                                    product_price,
                                                                                    product_description, 
                                                                                    lang_used, 
                                                                                    product_img1, 
                                                                                    product_img2, 
                                                                                    product_img3, 
                                                                                    product_img4, 
                                                                                    product_vid,
                                                                                    user_id
                                                                                    ) 
                                                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                        $inserting->execute(array($pname, $mainCategory, $pprice, $pDescription, $pplang, $pimg1_filename, $pimg2_filename, $pimg3_filename, $pimg4_filename, $pvid, $user_id['user_id']));
                                    }
                                    ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial_scale=1.0">
    <title>M&#8734M | Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome\css\fontawesome.min.css">


</head>

<body>
  <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <header>
                    <?php
                        echo '<img class="cover_img" src="uploads/Images/'. $fetchUserInfo['cover_pic']. '" alt="User-Profile-image">';
                    ?>
            <div class="header-container">
                <div class="profile-image">
                    <?php
                        echo '<img src="uploads/Images/'. $fetchUserInfo['profile_pic']. '" alt="User-Profile-image">';
                    ?>
                </div>
                <div class="profile-info">
                    <h2><?php echo $fetchUserInfo['first_name'] . ' ' . $fetchUserInfo['last_name'] ?></h2>
                    <span><?php echo $fetchUserInfo['username'] ?></span>
                </div>
                <div class="profile-options">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <span class="alerte-massage">1</span>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-body">
            <div class="left-side">
                <div class="profile-side">
                    <div class="profile-info-2">
                        <h2><?php echo $fetchUserInfo['first_name'] . ' ' . $fetchUserInfo['last_name'] ?></h2>


                        <span><?php echo $fetchUserInfo['username'] ?></span>
                    </div>
                    <p class="adress"><i class="fas fa-map-marked-alt"></i><?php echo $fetchUserInfo['country'] ?></p>
                    <p class="mobile-number"><i class="fa fa-phone"> </i><?php echo $fetchUserInfo['phone_no'] ?></p>
                    <p class="email"><i class="fa fa-envelope"></i><?php echo $fetchUserInfo['email'] ?></p>
                    <div class="user-bio">
                        <h3>Bio</h3>
                        <p class="bio"><?php echo $fetchUserInfo['bio'] ?></p>
                    </div>
                    <div class="profile-btn">
                        <button class="chat-btn">
                            <i class="fas fa-comments"></i>Chat
                        </button>
                        <button class="create-btn">
                            <i class="fa fa-plus"></i> Create
                        </button>
                    </div>
                    <div class="user-rating">
                        <h3 class="rating">
                            4.5
                        </h3>
                        <div class="rate">
                            <div class="starts">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="user-reviews">
                                123 &nbsp; &nbsp; reviews
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class="nav">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">Posts</li>
                        <li onclick="tabs(1)" class="user-reviews ">Reviews</li>
                        <li onclick="tabs(2)" class="user-setting ">Settings</li>
                    </ul>
                </div>
                <div class="profile-body">
                    <div class="profile-post tab ">
                        <h1>Your Products</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi architecto obcaecati harum mollitia natus explicabo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, cupiditate distinctio iste asperiores nam suscipit! </p>
                        <div class="user-posts">
                            <div class="post">
                                <a class="button" href="#popup" id="button"><i class="fa fa-plus"></i></a>
                            </div>
                            <?php 
                            $fetchProducts = $db->prepare('SELECT * FROM products WHERE user_id = ?');
                            $fetchProducts->execute(array($enteredID));
                            $products = $fetchProducts->fetchAll();
                            foreach($products as $product){
                                echo '<div class="post">';
                                echo '<a href="single-product.php?id='. $product['product_id'] .'"><img src="uploads/Images/'. $product['product_img1'] .'" ></a>';
                                echo '<p>'. $product['product_name'] .'</p>';
                                echo '</div>';
                            }
                            ?>
                            <div class="popup" id="popup">
                                <div class="popup-white">
                                    <a href=" #" class="close" id="close"><i  class="fas fa-times"></i></a>
                                    <div class="popup-content">
                                        <h3>Add Product</h3>
                                    </div>
                                    <div class="container-settins">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                            <label>Product Name</label>
                                            <input type="text" name="product-name" placeholder="Product Name ">

                                            <label>Product Price (By Dollars)</label>
                                            <input type="number" name="product-price" placeholder="Product Price ">

                                            <?php
                                            $category = $db->prepare('SELECT * FROM categories');
                                            $category->execute();
                                            $categories = $category->fetchAll();

                                            $subCategory = $db->prepare('SELECT * FROM subcategories');
                                            $subCategory->execute();
                                            $subCategories = $subCategory->fetchAll();
                                            ?>

                                            <label for="category">Product Category</label>
                                            <select name="category">
                                                <option selected="selected">Choose a main category ...</option>
                                                <?php
                                                foreach ($categories as $cat) {
                                                    echo '<option value="' . $cat['category_name'] . '">' . $cat['category_name'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <select name="sub_category" id="">
                                                <option selected="selected">Choose the Sub Category ...</option>
                                                <?php
                                                foreach ($subCategories as $subCat) {
                                                    echo '<option value="' . $subCat['subcategory_name'] . '">' . $subCat['subcategory_name'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <label>Product Description</label>
                                            <input type="textarea" name="product-description" placeholder="Product Description">

                                            <label>Programming Language Used</label>
                                            <input type="text" name="product-program-lang" placeholder="Example: PHP, JavaScript">

                                            <label>Product Images (Optional)</label>
                                            <input name="product-img1" type="file">
                                            <input name="product-img2" type="file">
                                            <input name="product-img3" type="file">
                                            <input name="product-img4" type="file">

                                            <label>Product Video Description (Optional)</label>
                                            <input name="product-vid" type="file">

                                            <input type="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-reviews tab ">
                    <h1>Your Reviews</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi architecto obcaecati harum mollitia natus explicabo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, cupiditate distinctio iste asperiores nam suscipit! </p>

                </div>

                <?php
                    if(isset($_POST['save'])){
                        $user_data = $db->prepare('SELECT * FROM users WHERE username = ?');
                        $user_data->execute(array($userSession));
                        $get_user_data = $user_data->fetchAll();


                        $first_name  = $_POST['first_name'];
                        $last_name   = $_POST['last_name'];
                        $phone_no    = $_POST['phone_no'];
                        $bio         = $_POST['bio'];
                        $country     = $_POST['country'];
                        $cover_img   = $_POST['cover_img'];
                        $profile_img = $_POST['profile_img'];

                        $coverImg_filename = $_FILES['cover_img']['name'];
                        $profileImg_filename = $_FILES['profile_img']['name'];

                        move_uploaded_file($_FILES['cover_img']['tmp_name'], "uploads/images/" . $coverImg_filename);
                        move_uploaded_file($_FILES['profile_img']['tmp_name'], "uploads/images/" . $profileImg_filename);

                        $profile_data = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, phone_no = ?, bio = ?, country = ?, cover_img = ?, $profile_img = ? WHERE username = ?');
                        $profile_data->execute(array($first_name, $last_name, $phone_no, $bio, $country, $cover_img, $profile_img, $userSession));
                    }
                ?>






                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="profile-setting tab ">
                        <h1>Account Setting</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi architecto obcaecati harum mollitia natus explicabo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, cupiditate distinctio iste asperiores nam suscipit! </p>
                        <div class="container-settins">
                            <div class="name">
                                <div class="firstname">
                                    <label>First Name </label>
                                    <?php
                                    $getNameData = $db->prepare('SELECT first_name, last_name, FROM users WHERE username = ? limit 1');
                                    $getNameData->execute(array($userSession));
                                    $data_name = $getNameData->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <input type="text" placeholder="First Name" name="first_name" value="<?php echo $data_name['first_name'] ?>">
                                </div>
                                <div class="lastname">
                                    <label>Last Name </label>
                                    <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $data_name['last_name'] ?>">
                                </div>
                            </div>
                            <div class="name2">
                                <label>upload Cover your photo</label>
                                <div>
                                    <input type="file" name="cover_img" id="real-file" hidden="hidden" />
                                    <button type="button" id="custom-button">CHOOSE A FILE</button>
                                    <span id="custom-text">No file chosen, yet.</span>
                                </div>
                            </div>
                            <div class="name2">
                                <label>upload your Profile photo</label>
                                <div>
                                    <input type="file" name="profile_img" id="real-file" hidden="hidden" />
                                    <button type="button" id="custom-button">CHOOSE A FILE</button>
                                    <span id="custom-text">No file chosen, yet.</span>
                                </div>
                            </div>



                            <label>Email </label>
                            <input type="email" placeholder="email@moom.com" value="<?php echo $data_name['email'] ?>">

                            <h3>Change Password</h3>

                            <label> old Password</label>
                            <input type="password" placeholder="*******">
                            <div class="name">
                                <div>
                                    <label> New Password</label>
                                    <input type="password" placeholder="*******">
                                </div>
                                <div>
                                    <label> rapeat Password</label>
                                    <input type="password" placeholder="*******">
                                </div>
                            </div>
                            <h3>More Info</h3>
                            <label>Phone Number</label>
                            <input type="number" name="phone_no" placeholder="+20 " value="<?php echo $data_name['phone_no'] ?>">
                            <div>
                                <label>Country </label>
                                <select name="country" id="">
                                    <option value="">

                                    </option>
                                </select>
                            </div>

                            <label>Bio </label>
                            <input type="text" placeholder="Your Bio " name="bio" value="<?php echo $data_name['bio'] ?>">

                            <input type="submit" name="save" value="Save" id="custom-button">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

   

<?php include 'includes/footer.php'; ?>

</body>

</html>