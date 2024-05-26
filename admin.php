<?php
session_start();
include('connection.php');
if(isset($_POST['Login'])){
  $query="select * from admin where email= '$_POST[email]' AND pwd= '$_POST[pwd]'";
  $query_run=mysqli_query($connection,$query);
  if(mysqli_num_rows($query_run)){
    while($row=mysqli_fetch_assoc($query_run)){
      $_SESSION['sno']=$row['sno'];
      $_SESSION['email']=$row['email'];
      $_SESSION['nameid']=$row['nameid'];
    }
    echo "<script type='text/javascript'>
    window.location.href='dashboard_admin.php';
    </script>";
  } else {
    echo "<script type='text/javascript'>
    alert('Please Enter Correct Details!');
    window.location.href='admin.php';
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c5858;
            margin: 0;
            padding: 0;
        }
        .login {
            width: 30%;
            margin: auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 100px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="login">
        <h1>Admin Login</h1>
        <form method="post">
            <label for='email'>Email:</label>
            <input id='email' name='email' type='email' placeholder="Enter Email" required>

            <label for='pwd'>Password:</label>
            <input id='pwd' name='pwd' type='password' placeholder="Enter Password" required>

            <input type="submit" name="Login" value="Login">
        </form>
    </div> 
</body>
</html>
