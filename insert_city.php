<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("databaseConnect.php");
if(isset($_POST['submit'])){
  /* print_r($_POST);die; */
    $state_name=$_POST['branch_state'];
    $city_name=$_POST['city_name'];
    $sql_insert="INSERT INTO `branch_city`(`state_id`,`city_name`) VALUES ('$state_name','$city_name')";
    /* die; */
    $sql_conn=mysqli_query($conn,$sql_insert);
     /* print_r($sql_conn);die; */
  }
?>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
  <body>
<form action="insert_city.php" method="POST" enctype="multipart/form-data">
 <!--  <div class="container"> -->
  <div class="form-group">
    
    <div class="col-sm-6"> 
      <div id ="list">
      <a class="btn btn-primary" href="./index.php" role="button">Insert Data</a>
      <a class="btn btn-primary" href="./read.php" role="button">All Records</a>
      <a class="btn btn-primary" href="./dashboard.php" role="button">Dashboard</a>
      <a class="btn btn-primary" href="./insert_state.php" role="button">Add State</a>     
      <div class="form-group">
      <label for="state">State:</label>
  <select id="state"class="form-control" name="branch_state">
    <option value="">Select State</option>
    <?php
      $conn = mysqli_connect("localhost", "root", "", "ispdb");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT id, state_name FROM branch_state";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
      }
    ?>
    </select>
    </div>
    <div class="form-group">
      <label for="usr">Branch Name:</label>
      <input type="text" class="form-control" id="city_name" name="city_name">
    </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
      </div>
      </div>
    </form>
  </body>
</html>