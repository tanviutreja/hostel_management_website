<?php
include('connection.php');
if(isset($_POST['submit'])){
    $query="insert into user values(null,'$_POST[sname]','$_POST[enrollment]','$_POST[branch]','$_POST[year]','$_POST[contact]','$_POST[gender]','$_POST[father]','$_POST[mother]','$_POST[email]','$_POST[address]','$_POST[pwd]')";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      alert('User Registered');
      window.location.href='home.php';
      </script>
       ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error :Failed to register!');
        window.location.href='register.php';
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
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#1c5858;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 50px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #b893bb;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="email"], input[type="password"], select, textarea {
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
    <div class="container">
        <h1>Student Information</h1>
        <h2>Kindly fill the form below</h2>
        <form method="POST" action="register.php">
            <label for='sname'>Full Name:</label>
            <input id='sname' name='sname' type='text' required pattern="[A-Za-z ]+" title="Please enter a valid name (no numbers or special characters)">

            <label for='enrollment'>Enrollment Number:</label>
            <input id='enrollment' name='enrollment' type='number' required pattern="[0-9]{7}" title="Please enter 7 digit enrollment number">

            <label for='branch'>Branch:</label>
            <input id='branch' name='branch' type='text' required>

            <label for='year'>Year:</label>
            <input id='year' name='year' type="number" required>

            <label for='contact'>Contact Number:</label>
            <input id='contact' name='contact' type="number" required pattern="[0-9]{10}" title="Please enter 10 digit phone number">

            <label for="gender">Select Gender:</label>
            <select name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for='father'>Father's Name:</label>
            <input id='father' name='father' type='text' required pattern="[A-Za-z ]+" title="Please enter a valid name (no numbers or special characters)">

            <label for='mother'>Mother's Name:</label>
            <input id='mother' name='mother' type='text' required pattern="[A-Za-z ]+" title="Please enter a valid name (no numbers or special characters)">

            <label for='email'>Email:</label>
            <input id='email' name='email' type="email" required>

            <label for='address'>Address:</label>
            <textarea name="address" id="address" rows="5" cols="20" wrap="hard" required></textarea>

            <label for='pwd'>Password:</label>
            <input id='pwd' name='pwd' type='password' required>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
