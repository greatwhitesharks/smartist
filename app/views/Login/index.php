    <div class="main-wrapper">
        <div class="container-fluid" align="center">
            <h1> Welcome to Smartist</h1>
            <h2> <i> Join today to enhance your music career!<br></i></h2>
        </div>
    </div>
<div class="main-agileinfo" align="center">
    
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
            <div class="errormsg">
                <?php
                    if(isset($_GET['login'])){
                        echo 'Invalid username or password!';
                    }
                ?>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    <input type="checkbox" name="remember_me">Remember Me
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-3">
                    <button type="submit" class="btn btn-default" name="login">Log In</button>
                </div>
                
            </div>

            <div class="form-group">
                <label class="col-sm-offset-3 col-sm-4" for="signup"><i><br><br>New to Smartist?<br><br></i></label>
                <div class="col-sm-offset-4 col-sm-3">
                    <button type="submit" class="btn btn-default" name="signup" >Sign Up</button>
                </div>
            </div>

        </form>
        <ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
    </div>
</div>