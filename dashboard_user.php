
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="jquery.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
  $("#room_allocation").click(function(){
  
    $("#right_sidebar").load("room_form.php");
  });
});
  </script>


  <script type="text/javascript">
$(document).ready(function(){
  $("#leave_request").click(function(){
    
    $("#right_sidebar").load("leave.php");
  });
});
</script>


    <script type="text/javascript">
$(document).ready(function(){
  $("#suggestion").click(function(){
    
    $("#right_sidebar").load("suggestion.php");
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#rules").click(function(){
    
    $("#right_sidebar").load("rules.php");
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
      border-radius: 8px;
      font-size: 16px;
      width: 150px;
      margin: 20px;
      text-decoration: none;
      cursor:pointer;
    }

    .dashboard-button:hover {
      background-color: #1076b9;
    }

    .content {
  padding: 20px;
  text-align: center;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  grid-column: span 1;
  width: 1000px;
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

  <header>
  <?php
include('connection.php');
session_start();
if(isset($_SESSION['sname'])){
  echo"<header>
    <h1>Welcome $_SESSION[sname] $_SESSION[enrollment]</h1>
  </header>";}
?>
  </header>

  <div class="button-container">
    <a class="dashboard-button" href="dashboard_user.php" type="button" id="dashboard_button">Dashboard</a>
    <a class="dashboard-button"  type="button" id="room_allocation">Room allocation</a>
    <a class="dashboard-button"  type="button" id="leave_request">Leave Request</a>
    <a class="dashboard-button"  type="button" id="suggestion">Suggestions</a>
    <a class="dashboard-button"  type="button" id="rules">Rules & Regulation</a>
    <a class="dashboard-button" href="logout.php" type="button" id="logout" >Logout</a>
  </div>

  <div class="content" id="right_sidebar">
   
    <h1 >Notice</h1>
  <?php

$sql="SELECT * FROM notice";
$result=mysqli_query($connection,$sql);
if ($result->num_rows > 0){
   
    echo"<table>
        <tr>
            <th>SrNo.</th>
            <th>Topic</th>
            <th>Details</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
            echo"
        <tr>
            <td>{$row["nid"]}</td>
            <td>{$row["topic"]}</td>
            <td>{$row["detail"]}</td>
        </tr>";
        }
       
  echo"  </table>";
    }
?>
  <h1 style="margin-bottom: 20px;">Notifications</h1>
  <?php
  $sql = "SELECT * FROM `leave` where enrollment_id= '$_SESSION[enrollment]'";
   $result = mysqli_query($connection, $sql);

   if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['approve'] == 1) {
            echo "Outpass request has been approved for enrollment ID: " . $row['enrollment_id'];
            echo "<br><hr>";
        } else {
            echo "Leave request is pending for enrollment ID: " . $row['enrollment_id'];
            echo "<br><hr>";
        }
    }}
  ?>
  <br>
  <?php
  $sql = "SELECT * FROM room where enrollment_id= '$_SESSION[enrollment]'";
   $result = mysqli_query($connection, $sql);

   if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['roomno']) {
            echo "Room alloted to enrollment ID: " . $row['enrollment_id']." is ".$row['roomno'] ;
            echo "<br><hr>";
        } else {
            echo "Room  yet to be alloted to enrollment ID " . $row['enrollment_id'];
            echo "<br><hr>";
        }
    }}
  ?>
  </div>

  
</body>
</html>
