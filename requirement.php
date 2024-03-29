<html>
<html>

<head>
  <title>User Requirements</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
      text-align:center;
    }

    th {
      background-color: #faf7f7;
    }
    tr:nth-child(even) {
      background-color: hwb(0 92% 6%);
    }
  </style>
</head>

<body>
  <h2>Product Information</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone No.</th>
      <th>Max Budget</th>
      <th>Parking Area</th>
      <th>Total Rooms</th>
      <th>Total Floors</th>
    </tr>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'tiksha');
    $sql2 = "SELECT * FROM Dream_info";
    $result2 = mysqli_query($conn, $sql2);
    //product table se ak ak row fetch as object hoti then o ak ak object fetch var mai aayega 
    while ($fetch = mysqli_fetch_assoc($result2)) {
      echo "";
      ?>
      <tr>
        <td>
          <?php echo $fetch['ID'] ?>
        </td>
        <td>
          <?php echo ($fetch['Name']) ?>
        </td>
        <td>
          <?php echo ($fetch['Phone']) ?>
        </td>
        <td>
          <?php echo ($fetch['Max_budget']) ?>
        </td>
        <td>
          <?php echo ($fetch['Parking_area']) ?>
        </td>
        <td>
          <?php echo ($fetch['T_room']) ?>
        </td>
        <td>
          <?php echo ($fetch['T_floor']) ?>
        </td>
      </tr>
      <?php

      echo "";
    }
    ?>

  </table>
</body>

</html>