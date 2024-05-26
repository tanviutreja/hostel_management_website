
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="jquery.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
  $("#room_allot").click(function(){
  
    $("#right_sidebar").load("room_allot.php");
  });
});
  </script>


  <script type="text/javascript">
$(document).ready(function(){
  $("#leave_approve").click(function(){
    
    $("#right_sidebar").load("leave_approve.php");
  });
});
</script>


    <script type="text/javascript">
$(document).ready(function(){
  $("#suggestions").click(function(){
    
    $("#right_sidebar").load("suggestion_disp.php");
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#notice").click(function(){
    
    $("#right_sidebar").load("notice.php");
  });
});
</script>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      color: #fff;
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    header {
      background-color: #333;
      padding: 20px;
      text-align: center;
      grid-column: span 2;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin: 20px;
    }

    .dashboard-button {
      padding: 10px;
      background-color: #1c5858;
      color: #fff;
      border: none;
      border-radius: 15px;
      font-size: 16px;
      width: 150px;
      margin: 20px;
      text-decoration: none;
      cursor:pointer;
    }

    .dashboard-button:hover {
      background-color:#1076b9;
    }

    .content {
  padding: 20px;
  text-align: center;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  grid-column: span 1;
  width: 1050px;
  margin-right: 200px;
  height: auto;
 
  color: black; 
}
#logout:hover{
    background-color: red; 
}

 
  </style>
</head>
<body>

<?php
include('connection.php');
session_start();
if(isset($_SESSION['nameid'])){
  echo"<header>
    <h1>Welcome $_SESSION[nameid]</h1>
  </header>";}
?>
  <div class="button-container">
    <a class="dashboard-button" href="dashboard_admin.php" type="button" id="dashboard_button">Dashboard</a>
    <a class="dashboard-button"  type="button" id="room_allot">Room allocation</a>
    <a class="dashboard-button"  type="button" id="leave_approve">Leave approval</a>
    <a class="dashboard-button"  type="button" id="suggestions">Suggestions</a>
    <a class="dashboard-button"  type="button" id="notice">Notice</a>
    <a class="dashboard-button" href="logout.php" type="button" id="logout" >Logout</a>
  </div>

  <div class="content" id="right_sidebar">
  <h1 >Room allocation Request to check</h1>
    <?php
     $sql = "SELECT COUNT(*) AS roomcheck FROM `room` WHERE roomno IS NULL";
     $result = mysqli_query($connection, $sql);
     if ($result) {
     $row = mysqli_fetch_assoc($result);
    if ($row['roomcheck'] > 0) {
        echo "Number of rooms requests not yet seen : " . $row['roomcheck'];
    } else {
        echo "All room requests have been seen.";
    }}
    ?>
    <h1 >Leave  Request To check</h1>
    <?php
     $sql = "SELECT COUNT(*) AS pending_leaves FROM `leave` WHERE approve = 0";
     $result = mysqli_query($connection, $sql);
     if ($result) {
     $row = mysqli_fetch_assoc($result);
    if ($row['pending_leaves'] > 0) {
        echo "Number of leaves not yet attended : " . $row['pending_leaves'];
    } else {
        echo "All leaves have been attended.";
    }}
    ?>
    <br>
    <h1 style="margin-bottom: 20px;">Suggestions To check</h1>
    <?php
     $sql = "SELECT COUNT(*) AS suggestions FROM `suggestion` WHERE done = 0";
     $result = mysqli_query($connection, $sql);
     if ($result) {
     $row = mysqli_fetch_assoc($result);
    if ($row['suggestions'] > 0) {
        echo "Number of suggestions not yet seen : " . $row['suggestions'];
    } else {
        echo "All suggestions have been seen.";
    }}
    ?>
   </div>

  
</body>
</html>

