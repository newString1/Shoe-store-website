<?php
$insert = false;
$invalid = false;
if(isset($_POST['model'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $model = $_POST['model'];
    $size = $_POST['size'];

    if($size>0)
    {
      $sql = "INSERT INTO `shoeStore`.`availability` (`model`, `size`) VALUES ('$model', '$size');";

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    }
    // else{
    //   $invalid=true;
    // }
    

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Shoe Search Website</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    body {
      background-image: url('https://wallpaperaccess.com/full/1597753.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
    
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 20px;
      color: #fff;
      text-align: center;
    }

    .header {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .header span {
      color: #4CAF50;
      font-weight: bold;
    }

    .search-bar {
      margin-top: 20px;
    }

    .search-bar input[type="text"],
    .search-bar input[type="number"],
    .search-bar input[type="submit"] {
      padding: 12px 20px;
      font-size: 1rem;
    }

    .search-bar input[type="text"],
    .search-bar input[type="number"] {
      width: 300px;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
    }

    .search-bar input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .search-bar input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="header">
      Enter the <span>data</span>
    </h1>
    <div class="search-bar">
      <form action="store4.php" method="post">
        <input type="text" id="model" name="model" placeholder="Enter shoe name">
        <input type="number" id="size" name="size" placeholder="Enter shoe number" style="width: 300px;">
        <input type="submit" value="Search">
      </form>
      <?php
    if($insert==true){
      echo "<h3 class='header'>
<span>done!</span>
</h3>";

    }
    else if($invalid==true){
      echo "<h3 class='header'>
<span>Invalid input!</span>
</h3>";
    }

      ?>
    </div>
  </div>
</body>
</html>
