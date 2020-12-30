<?php
include('includes/connect.php');
session_start();

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

    <input type="checkbox" class="checkbox" id="checkid">
    <div class="poup-background">&nbsp;</div>
    <div class="nav-container">
        <ul class="popup-menu">
            <li><a href="">E-Commerce</a></li>
            <li><a href="">Freelancing</a></li>
            <li><a href="">Education</a></li>
            <li><a href="">Small Shops</a></li>
            <li><a href="">Companies Systems</a></li>
            <li><a href="">CRMs</a></li>
            <li><a href="">Chatting Apps</a></li>
            <li><a href="">Portofolios</a></li>
        </ul>
    </div>
    <nav>
        <div class="top">

            <label for="checkid" class="menu"><i class="fas fa-bars"></i></label>
            <img src="Image/logo.png" alt="Logo|M&#8734M ">
            <form class="input-search">
                <input type="search" class="search" placeholder="Search Here ...">
                <i class="fa fa-search"></i>
            </form>
            <ul class="nav-icons">
                <li class="search-icon"> <a><i class="fa fa-search"></i></a></li>
                <li class="icon-none"><a href=""><i class="fa fa-heart"></i></a></li>
                <li> <a href=""><i class="fa fa-shopping-cart"></i></a></li>
                <li class="icon-none"> <a href=""><i class="fa fa-user"></i></a></li>
                <li class="sign-out">Sign Out</li>
            </ul>
        </div>
        <div class="bottom">
            <ul class="category-menu">
                <li><a href="">E-Commerce</a></li>
                <li><a href="">Freelancing</a></li>
                <li><a href="">Education</a></li>
                <li><a href="">Small Shops</a></li>
                <li><a href="">Companies Systems</a></li>
                <li><a href="">CRMs</a></li>
                <li><a href="">Chatting Apps</a></li>
                <li><a href="">Portofolios</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <header>
            <img src="Image/background.jpeg" alt="">
            <div class="header-container">
                <div class="profile-image">
                    <img src="Image\image 1.jpg" alt="User-Profile-image">
                </div>
                <div class="profile-info">
                    <h2> User Name </h2>
                    <span>Nick Name</span>
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
                        <h2> User Name </h2>
                        

                        <span>Nick Name</span>
                    </div>
                    <p class="adress"><i class="fas fa-map-marked-alt"></i>State, Country</p>
                    <p class="mobile-number"><i class="fa fa-phone"> </i>01282304755</p>
                    <p class="email"><i class="fa fa-envelope"></i>mohamed@gmail.com \</p>
                    <div class="user-bio">
                        <h3><?php echo $_SESSION['Username'] ?></h3>
                        <p class="bio">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aperiam iure asperiores dolores consectetur necessitatibus at suscipit, fugiat maxime mollitia. Eos?
                        </p>
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
                        <h1>Your Posts</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi architecto obcaecati harum mollitia natus explicabo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, cupiditate distinctio iste asperiores nam suscipit! </p>
                        <div class="user-posts">
                            <div class="post">
                                <a class="button" href="#popup" id="button"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="post">
                                <a href=""><img src="Image/image 1.jpg"></a>
                                <p>Post Title</p>
                            </div>
                            <div class="post">
                                <a href=""><img src="Image/image 1.jpg"></a>
                                <p>Post Title</p>
                            </div>
                            <div class="post">
                                <a href=""><img src="Image/image 1.jpg"></a>
                                <p>Post Title</p>
                            </div>
                            <div class="post">
                                <a href=""><img src="Image/image 1.jpg"></a>
                                <p>Post Title</p>
                            </div>
                            <div class="post">
                                <a href=""><img src="Image/image 1.jpg"></a>
                                <p>Post Title</p>
                            </div>
                            <div class="popup" id="popup">
                                <div class="popup-white">
                                    <a href=" " class="close" id="close"><i class="fas fa-times-circle"></i></a>
                                    <div class="popup-content">
                                        <h3>Add Product</h3>
                                    </div>

                                    <?php
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
                                        $userSession   = $_SESSION['Username'];
                                        

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
                                        $inserting->execute(array($pname, $mainCategory, $pprice, $pDescription, $pplang, $pimg1, $pimg2, $pimg3, $pimg4, $pvid, $user_id['user_id']));
                                    }
                                    ?>

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
                <div class="profile-setting tab ">
                    <h1>Account Setting</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi architecto obcaecati harum mollitia natus explicabo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, cupiditate distinctio iste asperiores nam suscipit! </p>
                    <div class="container-settins">
                        <div class="name">
                            <div class="firstname">
                                <label>First Name </label>
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="lastname">
                                <label>Last Name </label>
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <label>Nick Name</label>
                        <input type="text" placeholder="Nick Name ">
                        <div class="name2">
                            <label>upload your photo</label>
                            <div>
                                <input type="file" id="real-file" hidden="hidden" />
                                <button type="button" id="custom-button">CHOOSE A FILE</button>
                                <span id="custom-text">No file chosen, yet.</span>
                            </div>
                        </div>
                        <div class="name2">
                            <label>upload your Profile photo</label>
                            <div>
                                <input type="file" id="real-file" hidden="hidden" />
                                <button type="button" id="custom-button">CHOOSE A FILE</button>
                                <span id="custom-text">No file chosen, yet.</span>
                            </div>
                        </div>



                        <label>Email </label>
                        <input type="email" placeholder="email@moom.com">

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
                        <input type="number" placeholder="+20 ">
                        <div class="name">
                            <div>
                                <label>State </label>
                                <input type="text" placeholder="State">
                            </div>
                            <div>
                                <label>Country </label>
                                <input type="text" placeholder="Country">
                            </div>
                        </div>

                        <label>Bio </label>
                        <input type="text" placeholder="Nick Name ">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="js/JQuery3.3.1.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <script type="text/javascript" src="js/profile-tab.js"></script>
    <script type="text/javascript" src="js/upload-photos.js"></script>



</body>

</html>