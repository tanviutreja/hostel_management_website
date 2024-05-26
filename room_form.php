
<?php
session_start();
if(isset($_SESSION['enrollment'])){
include('connection.php');

if(isset($_POST['submit'])){
    $query="insert into room values(NULL,'$_SESSION[enrollment]','$_POST[cgpa]','$_POST[accomodation]','$_POST[disability]','$_POST[requirement]',null)";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('request for room sent');
      window.location.href='dashboard_user.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to send the request!');
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
    <title>room allot</title>
</head>
<body>
<h1>Room allotment Form</h1>
<p>Fill the form to get a room or change a room</p>
<form method="post" action="room_form.php">
<label for='cgpa'> cgpa:</label>
<input id='cgpa' name='cgpa' type="text" required><br><br>
<label for="accomodation">Accomodation:</label>
    <select name="accomodation" id="accomodation" required>
      <option value="single">Single</option>
      <option value="double">Double</option>
      <option value="triple">Triplet</option>
    </select><br><br>
<label for="disability">Any disability</label><br>
<input type="radio" id="yes" name="disability" value="yes">
<label for="yes">Yes</label>
<input type="radio" id="no" name="disability" value="no">
<label for="no">No</label><br>
<label for="requirement">Any Specific Requirements</label><br>
<textarea name="requirement" id="requirement" rows="=100" cols="50" wrap="soft"></textarea><br><br>
<input type="submit" name="submit" value="submit"><br><br>
</form>
</body>
</html>
<?php }
else{
  header('Location:login.php');
  exit();
}?>