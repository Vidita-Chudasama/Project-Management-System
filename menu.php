<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-3" id="link-effect-3">
						<ul class="nav navbar-nav">
							<li><a href="index.php" data-hover="Home">Home</a></li>
                            <?php
								if(isset($_SESSION["unm"]))
								{
							?>
							<li><a href="perform_practical.php" data-hover="Perform Practical">Perform Practical</a></li>
							<li><a href="profile.php" data-hover="Profile">Profile</a></li>
                            <li><a href="change_password.php" data-hover="Change Password">Change Password</a></li>
                            <li><a href="logout.php" data-hover="Logout">Logout</a></li>
                            <?php
								}
								else
								{
							?>
							<li><a href="faculty.php" data-hover="Faculty">Faculty</a></li>
                            <li><a href="gallery.php" data-hover="Gallery">Gallery</a></li>
                            <li><a href="register.php" data-hover="Register">Register</a></li>
							<li><a href="login.php" data-hover="Login">Login</a></li>
                            <li><a href="contact_us.php" data-hover="Mail Us">Contact Us</a></li>
                            <?php
								}
							?>
						</ul>
					</nav>
				</div>
</nav>
<center>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Image</h4>
      </div>
      <div class="modal-body">
        <p>
        <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
        	<tr>
        		<input type="file" name="editp" required >
            </tr>
            <br>
            <tr>
        		<input type="submit" name="pr_updt" value="Update" class="btn btn-danger">
            </tr>
        </table>
        </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
      </div>
    </div>

  </div>
</div>
</center>