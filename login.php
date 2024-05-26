<?php
session_start();
include('connection.php');
if(isset($_POST['login'])){
  $query="select * from user where enrollment= '$_POST[enrollment]' AND pwd= '$_POST[pwd]'";
  $query_run=mysqli_query($connection,$query);
  if(mysqli_num_rows($query_run)){
    while($row=mysqli_fetch_assoc($query_run)){
      $_SESSION['sno']=$row['sno'];
      $_SESSION['email']=$row['email'];
      $_SESSION['sname']=$row['sname'];
      $_SESSION['enrollment']=$row['enrollment'];
    }
    echo "<script type='text/javascript'>
    window.location.href='dashboard_user.php';
    </script>";
  } else {
    echo "<script type='text/javascript'>
    alert('Please Enter Correct Details!');
    window.location.href='login.php';
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
    <title>Student Login</title>
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
        input[type="text"], input[type="number"], input[type="password"] {
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
        p {
            text-align: center;
        }
        a {
            color: #5cb85c;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login">
        <form method="post">
            <h1>User Login</h1>
            
            <label for='enrollment'>Username:</label>
            <input id='enrollment' name='enrollment' placeholder="Enter Username" type='number' required>

            <label for='pwd'>Password:</label>
            <input id='pwd' name='pwd' type='password' placeholder="Enter password" required>

            <input type="submit" name="login" value="Login">
            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
        </form>
    </div>
</body>
</html>
