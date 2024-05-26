
<?php
session_start();
if(isset($_SESSION['email'])){
include('connection.php');

if(isset($_POST['send'])){
    $query="insert into notice values(NULL,'$_POST[topic]','$_POST[detail]')";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('notice sent');
      window.location.href='dashboard_admin.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to send the notice!');
        window.location.href='notice.php';
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
    <title>Notice</title>
</head>
<body>
   <h1>Write The Notice</h1>
   <form method="post" action="notice.php">
   <label for='topic'> Topic</label><br>
   <input id='topic' name='topic' placeholder="Enter topic" type='text' required><br><br>
   <label for="detail">Details</label><br>
   <textarea name="detail" id="detail" rows="10" cols="50" wrap="soft"></textarea><br><br>
   <input type="submit" name="send" value="send" id="noticeSubmit"><br><br>

   </form>
</body>
</html>
<?php }
else{
  header('Location:admin.php');
  exit();
}?>