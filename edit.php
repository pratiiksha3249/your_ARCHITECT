<html>
<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="edit.css">
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

            <li><a href="History.php">History</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

            <li><a href="admin_validation.php">Admin</a></li>
            &nbsp&nbsp&nbsp&nbsp    &nbsp&nbsp&nbsp&nbsp

        </ul>
        <div class="auth-buttons">
            <button class="login-btn">Login</button>
            <button class="signup-btn">Sign Up</button>
        </div>
    </nav>

    <div class="container">
        <h2>Upload File</h2>
        <!-- when u want to send file to server then use  enctype -->
        <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title1" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price1" required>
            </div>
            <div class="form-group">
                <label for="file">Select File:</label>
                <input type="file" id="file" name="file1" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">ADD</button>
            </div>
        </form>
    </div>
   
    </body>
    </html>

<?php
       if(isset($_POST['submit']))
//    if($_SERVER["REQUEST_METHOD"] == "POST")
      {
          $conn = mysqli_connect('localhost', 'root', '', "tiksha");  
          if (!$conn) {
              die("Connection failed: ". mysqli_connect_error());
          }
        $filename = $_FILES["file1"]["name"];
        $id = $_GET['id'];
        $price = $_POST['price1'];
        $title = $_POST['title1'];
        $tempfile = $_FILES["file1"]["tmp_name"];
        $folder = 'image/'.$filename;
        $sql = "UPDATE product SET  image = '$filename',title = '$title', price='$price' WHERE id= '$id' ";
        if($filename == "")
        {
            echo (" <script> alert('Please select an image'); </script>");
        }
        else{
            
            $result = mysqli_query($conn, $sql);
             //  move_uploaded_file is a functiion esko two parameters dete 1 jhanse file leni hai or 2ra udhar store krni hai
            move_uploaded_file($tempfile, $folder);
            echo ("<script>alert('file updated successfully');</script>");
             header("location: admin.php");
        }
      }
?>