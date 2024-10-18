<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SignIn | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="login-box">
    <p>Admin Login</p>
        <img src="resorces/logo.png" style="width: 100px; height: 100px; margin-left: 35%; margin-bottom: 10px;">
        
        
            <div class="user-box">
                <input  id="adminEmail" type="text">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input  id="adminPassword" type="password">
                <label>Password</label>
            </div>
            <button class="btn btn-light px-4" onclick="adminSignIn();">Sign In</button>
        
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>