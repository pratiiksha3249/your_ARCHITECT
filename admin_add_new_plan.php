
<html>
<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="admin_add_new_plan.css">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;

        }
  .bg{
    background-color: rgba(10, 53, 61, 0.8);
 
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

            <li><a href="History.php">History</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <li> <a href="admin_validation.php">Admin</a> </li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

        </ul>
        <div class="auth-buttons">
            <button class="login-btn"><a href="login.php">Login</a></button>
            <button class="signup-btn"><a href="signup.php">Signup</a></button>
        </div>
    </nav>
    <h2 align="center"> ADD NEW PLAN</h2>
    <div class="container">
        
        <!-- when u want to send file to server then use  enctype -->
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="file">Select File:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit1">ADD</button>
            </div>
        </form>
    </div>
    
    <?php
    //   if(isset($_POST['submit1']))
    if($_SERVER["REQUEST_METHOD"] == "POST")
      
      {
          $conn = mysqli_connect('localhost', 'root', '', "tiksha");  
          if (!$conn) {
              die("Connection failed: ". mysqli_connect_error());
          }
        //  we have to select only file name frome file object  
        $filename = $_FILES["file"]["name"];
        // $output = $_FILES["file"];
        // echo "<script>console.log('Debug Objects: " . $output["tmp_name"] . "' );</script>";
        // echo $_FILES["file"];
        $price = $_POST['price'];
        $title = $_POST['title'];
        // aapne udhar file store ki udhar se buss aapn tmp_name mai uska path copy kr rahai hai
        $tempfile = $_FILES["file"]["tmp_name"];
        // jb aapn user se input file lete to aapn server ko bta rahi ki o 
        //file tiksha us folder hai add krna chahti udhar kr like aapn ke image folder bnaya hai 
        $folder = 'image/'.$filename;
        $sql = "INSERT INTO product (image, title, price) VALUES ( '$filename', '$title' , '$price')";
    //    if user ne file select nni ki to if main nhi jaye or alert krega
        if($filename == "")
        {
            echo (" <script> alert('Please select an image'); </script>");
        }
        else{
            
            $result = mysqli_query($conn, $sql);
             //  move_uploaded_file is a functiion esko two parameters dete 1 jhanse file leni hai or 2ra udhar store krni hai
            move_uploaded_file($tempfile, $folder);
            echo ("<script>alert('Image uploaded successfully');</script>");
            $_POST['submit1']=false;
            
        }
      }
?>
   
       <div class="pcontainer">
        <h2 align="center"> Available Products</h2>

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
                    <h3>Home Name: <?php echo $fetch['title'] ?></h3>
                    <p>Price: <?php echo $fetch['price'] ?></p>
                    <div class="actions">
                        <button> <a href="edit.php?id=<?php echo $fetch['id'] ?>" style="text-decoration: none; color : white"  >Edit </a></button>
                       
                        <button><a href="delete.php?id=<?php echo $fetch['id'] ?>" style="text-decoration: none; color: white" >Delete</a></button>
                    </div>
                </div>
            </div>
            
        <?php

               echo "";
            } 
            ?>
 </div>
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