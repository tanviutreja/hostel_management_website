
<?php
session_start();
if(isset($_SESSION['enrollment'])){
include('connection.php');

if(isset($_POST['request'])){
    $query="insert into `leave` values(NULL,'$_SESSION[enrollment]','$_POST[permission]','$_POST[pcontact]','$_POST[reason]','$_POST[depart]','$_POST[arrive]','$_POST[address_to]',0)";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('leave sent');
      window.location.href='dashboard_user.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to send the leave!');
        window.location.href='dashboard_user.php';
        </script>
         ";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <title>rules</title>
</head>
<body>
    <h1>OutPAss</h1>
  <form method="post" action="leave.php">
    <label for="permission">Parents Permission Taken</label><br>
    <input type="radio" id="yes" name="permission" value="yes">
    <label for="yes">Yes</label>
    <input type="radio" id="no" name="permission" value="no">
    <label for="no">No</label><br>
    <label for="pcontact">Parents Mobile Number</label>
    <input id='pcontact' name='pcontact' type="number"  required pattern="[0-9]{10}" title="Please enter 10 digit phone number"required><br><br>
    <label for='reason'> Reason For Leave</label><br>
    <input id='reason' name='reason' placeholder="Enter Reason for leave" type='text' required><br><br>
    <label for='depart'> Leaving on</label><br>
    <input id='depart' name='depart' type="date" required><br><br>
    <label for='arrive'> Arriving on</label><br>
    <input id='arrive' name='arrive' type="date" required><br><br>
    <label for="address_to">Address On Leave</label><br>
    <textarea name="address_to" id="address_to" rows="=100" cols="50" wrap="soft" required></textarea><br><br>
    <input type="submit" name="request" value="request"><br><br>
   </form>
   
 
</body>
</html>
<?php }
else{
  header('Location:login.php');
  exit();
}?>