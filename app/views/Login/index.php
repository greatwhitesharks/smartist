<!-- <!DOCTYPE html> -->
<!-- <html lang="en">

<head>
    <title>LogIn</title>
    <meta charset="utf-8">
    <link rel="icon" href="music1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body> -->
    <div class="main-wrapper">
        <div class="container-fluid" align="center">
            <h1 style="font-family: Calibri; font-size: 60px; color: #561d7c"> Welcome to Smartist</h1>
            <h2 style="font-family: Calibri; font-size: 30px; color: #561d7c"> <i> Join today to enhance your music career!<br></i></h2>
        </div>
    </div>
<div class="container-fluid" align="center">
    <div><br><br>
        <form class="form-horizontal" action="<?= PUBLIC_URL . '/login/do'?>" method="POST">
            <div class="form-group" align="center">
                <label class="control-label col-sm-offset-1 col-sm-3" for="email">Username or Email Address:</label>
                <div class="col-sm-5" align="center">
                    <input type="text" class="form-control" placeholder="Enter username/email" name="username_email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-3" for="password">Password:</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-3">
                    <input type="checkbox" name="remember_me">Remember Me</div>
                    <div class="col-sm-offset-5">
                    <button type="submit" class="btn btn-default" name="login">Log In</button></div>
                
            </div>
            <div class="form-group">
                <label class="col-sm-offset-4 col-sm-4" for="signup"><i>New to Smartist?</i></label>
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" class="btn btn-default" name="signup" >Sign Up</button>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- </body>
</html> -->