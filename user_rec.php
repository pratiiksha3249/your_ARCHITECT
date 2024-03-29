<html>

<head>
    <title>User Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user-item {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .user-name {
            font-weight: bold;
        }

        .products {
            margin-top: 5px;
            display: flex;
            flex-wrap: wrap;
        }

        .product {
            display: inline-block;
            background-color: #ddd;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            width: 300px;
        }

        .product img {
            width: 300px;
            height: 200px;
            display: block;
            margin: 0 auto 10px;
            border-radius: 5px;
        }

        .product-details {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Records</h1>

        <ul class="user-list">
            <li class="user-item">
                <div class="products">

                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'tiksha');
                    $sql2 = "SELECT * FROM buy";
                    $result2 = mysqli_query($conn, $sql2);
                    //product table se ak ak row fetch as object hoti then o ak ak object fetch var mai aayega 
                    
                    while ($fetch = mysqli_fetch_assoc($result2)) {
                        echo "";
                        ?>
                        <!-- <span class="user-name">User 1:</span> -->
                        <div class="product">
                        <img src="./image/<?php echo $fetch['Pid'] ?>" alt="Product 1">
                            <div class="product-details">
                                <span class="product-name"><b>Name:<b><?php echo $fetch['title'] ?></span>
                                <br>
                                <span class="product-price"><b>Price:</b><?php  echo $fetch['price']?></span>
                                <br>
                                <span class="product-price"><b>User Name:<b><?php echo $fetch['user']?></span>
                                <br>
                                <span class="product-price"><b>Phone:</b><?php echo $fetch['phone']?></span>
                                <br>
                                <span class="product-price"><b>Adress:</b><?php  echo $fetch['address']?></span>
                            </div>
                        </div>
                        <?php

                        echo "";
                    }
                    ?>
                </div>

            </li>
        </ul>
    </div>



</body>

</html>