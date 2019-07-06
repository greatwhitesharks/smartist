<div class= style="background-color: #6f5499">
<header>
	<nav>
		<div class="main-wrapper">
			<div class="container-fluid" align="center">
				<h1> Welcome to Smartist</h1>
				<h2> <i> Join today to enhance your music career!<br></i></h2>
				<ul class="nav nav-tabs nav-justified">
					<li class="nav-item "><a href="<?= PUBLIC_URL ?>/signup/"><i class="fa fa-user"></i>Individual</a></li>
					<li class="nav-item active"><a href="#"><i class="fa fa-users"></i>Group</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>


<body >
	<div class="main-agileinfo" align="center">
	<div align="left"> <br> 
		<form class="form-horizontal" action="<?= PUBLIC_URL . '/signup/do'?>" method="POST">
		<input type="hidden" name="type" value="group">
			<div class="form-group"> <br><br>
				<label class="control-label col-sm-offset-2 col-sm-2" for="name">Group Name:</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" placeholder="Enter name" name="name" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-offset-2 col-sm-2" for="email">Email Address:</label>
				<div class="col-sm-5">
					<input type="email" class="form-control" placeholder="Enter email" name="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The email you entered is invalid.">
				</div>
			</div>
			<div class="errormsg">
                <?php
                    if(isset($_GET['email'])){
                        echo 'email unavailable.';
                    }
                ?>
            </div>
			<div class="form-group">
				<label class="control-label col-sm-offset-2 col-sm-2" for="username">Username:</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" placeholder="Enter username" name="username" required="required" pattern="[a-z0-9]{3,}">
				</div>
			</div>
			<div class="errormsg">
                <?php
                    if(isset($_GET['username'])){
                        echo 'Username unavailable.';
                    }
                ?>
            </div>
			<div class="form-group">
				<label class="control-label col-sm-offset-2 col-sm-2" for="password">Password:</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" placeholder="Enter password" id='password' name="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Your password must contain at least one number,one uppercase letter, one lowercase letter, and should consist of 6 or more characters">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-offset-2 col-sm-2" for="reenter_password">Re-enter Password:</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" placeholder="Re-enter password" name="reenter_password" required="required">
				</div>
			</div>
			<div class="errormsg">
                <?php
                    if(isset($_GET['password'])){
                        echo 'Password mismatch';
                    }
                ?>
            </div>
            <div class="form-group">
				<label class="control-label col-sm-offset-2 col-sm-2">We are:</label>
				<div class="checkbox col-sm-offset-5"> <label><input type="checkbox" name="occupation[]" value="singer">Singers</label></div>
				<div class="checkbox col-sm-offset-5"><label><input type="checkbox" name="occupation[]" value="lyricist">Lyricists</label></div>
				<div class="checkbox col-sm-offset-5"><label><input type="checkbox" name="occupation[]" value="music_producer">Music Producers</label></div>
				<div class="checkbox col-sm-offset-5"><label><input type="checkbox" name="occupation[]" value="other">Other <input name="other_ocu" type="text" placeholder="  Please specify  "></label></div>
			</div><br>
			<div class="form-group">
				<div class="col-sm-offset-6 col-sm-3">
					<button type="submit" class="btn btn-default" name="signup" style="font-family: Calibri;">Sign Up!</button>
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
</body>
</html>
