
<?php
session_start();
if(isset($_SESSION['enrollment'])){
include('connection.php');

if(isset($_POST['send'])){
    $query="insert into suggestion values(NULL,'$_POST[topic]','$_POST[suggest]',0)";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('suggestion sent');
      window.location.href='dashboard_user.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to send the suggestion!');
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
   <h1>suggestions and complaints</h1>
   <form method="post" action="suggestion.php">
   <label for='topic'> Topic</label><br>
   <input id='topic' name='topic' placeholder="Enter topic" type='text' required><br><br>
   <label for="suggest">Suggestion</label><br>
   <textarea name="suggest" id="suggest" rows="=100" cols="50" wrap="soft"></textarea><br><br>
   <input type="submit" name="send" value="send"><br><br>

   </form>
</body>
</html>
<?php }
else{
  header('Location:login.php');
  exit();
}?>