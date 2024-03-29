
<html>
<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="product.css">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;

        }

    </style>
</head>

<body>
<nav>
        <div class="logo">
            <div>
                <font class="font1">your_</font>
                <font class="font2">ARCHITECT </font>
            </div>
        </div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
            
            <li><a href="product.php">Products</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <li><a href="Make_Your_Dream.php">Make_Your_Dream</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <!-- <li><a href="History.php">History</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp -->

            <li><a href="admin.php">Admin</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

        </ul>
        <div class="auth-buttons">
        <button class="login-btn"><a href="login.php">Login</a></button>
            <button class="signup-btn"><a href="signup.php">Signup</a></button>
        </div>
    </nav>
<button class="back_button"><a href="index.html">GoBack</a></button>

       <div class="msg">
    <h2 align="center"> Select Your Dream House</h2>
       </div>


       <div class="pcontainer">
        <div class="products">
        <?php
            $conn = mysqli_connect('localhost','root','','tiksha');
            $sql2 = "SELECT * FROM product";
        $result2 = mysqli_query($conn, $sql2);
        //product table se ak ak row fetch as object hoti then o ak ak object fetch var mai aayega 
            while($fetch = mysqli_fetch_assoc($result2))
            {
                echo "";
                ?>
            <div class="product">
                <!-- src="./image/ aapn ye pura folder open kr ke de rhai or buss udhar user
                  selected image ka file name add kr rahi   --> 
                <img src="./image/<?php echo $fetch['image'] ?>" alt="Product 1">
                <div class="product-info">
                    <h3 class="product_price">House Name:<?php echo $fetch['title'] ?></h3>
                    <p class="product_price" >Price: <?php echo $fetch['price'] ?></p>
                    <div class="actions">
                        <button> <a href="img_about.html" style="text-decoration: none; color : white"  >About </a></button>
                       
                        <button><a href="Buy.php?id=<?php echo $fetch['image'] ?>&price=<?php echo $fetch['price'] ?>&title=<?php echo $fetch['title'] ?>" style="text-decoration: none; color: white" >Buy</a></button>
                    </div>
                </div>
            </div>
            
        <?php

               echo "";
            } 
            ?>
 </div><br><br><br>
 <footer>
        <div class="footer-container">
            <div class="social-icons">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-info">
                <p>&copy; 2024 Your Company. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>