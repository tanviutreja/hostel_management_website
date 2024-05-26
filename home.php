<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('hostel.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: #fff;
            background-color: rgba(28, 88, 88, 0.8);
            padding: 20px 40px;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-bottom: 40px;
            border-radius: 8px;
        }
        .button-container {
            text-align: center;
        }
        .button {
            background-color: rgba(28, 88, 88, 0.8);
            color: #fff;
            border: none;
            padding: 15px 30px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: rgba(0, 123, 255, 0.8);
        }
    </style>
    <title>Home</title>
</head>
<body>
    <div class="heading-container"> 
        <h1>WELCOME TO JAYPEE HOSTELS</h1>
    </div>
    <div class="button-container">
        <a href="login.php" class="button">Login</a>
        <a href="register.php" class="button">Register</a>
        <a href="admin.php" class="button">Admin Login</a>
    </div>
</body>
</html>



