<?php
	include("__Connection.php");
	
	if(!isset($_SESSION["unm"]))
	{
			header("location:login.php");
	}
	
	$sel="select * from user_reg join course on course.courseid=user_reg.courseid where uid=".$_SESSION["id"];
	$ex=mysqli_query($conn,$sel);
	$data=mysqli_fetch_assoc($ex);
	
	if(isset($_REQUEST["pr_updt"]))
	{
			$fl="Profile/".$_FILES["editp"]["name"];
			mysqli_query($conn,"update user_reg set photo='$fl' where uid=".$_SESSION["id"]);
			move_uploaded_file($_FILES["editp"]["tmp_name"],"Profile/".$_FILES["editp"]["name"]);
			header("location:profile.php");
	}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Project Evaluation</title>
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholar Vision Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->
<!-- Custom-Stylesheet-Links -->
	<!-- Bootstrap-CSS --> <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Font-awesome-CSS --> <link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- Index-Page-CSS --><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom-Stylesheet-Links -->
<!--web-fonts-->
	<!-- Headings-font --><link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
	<!-- Body-font --><link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--//web-fonts-->
<!-- js -->
<!-- favicon --><link rel="icon" href="images/icon.png" >
<!--.circle
{
    border-radius: 50%;
    width: 500px;
    height: 500px;
    background: red;
}-->
</head>
<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
		<div class="banner-overlay-agileinfo">
		<?php include("header.php"); ?>		
			<div class="container">
			<?php include("menu.php"); ?>		
				<h2 class="inner-tittle-w3layouts"><?php echo $_SESSION["unm"]; ?></h2>
			</div>
		</div>
</div>
<div>
<br><br><br>
    	<table class="table table-bordered" style="width:50%!important" cellpadding="5" cellspacing="5" align="center">
        	<tr>
            	<th colspan="2">
                	<center>
                		<img src="<?php echo $data["photo"]; ?>" height="200" width="200" class="circle" data-toggle="modal" data-target="#myModal" >
                    </center>
                </th>
            </tr>
            <tr>
            	<th>Name :</th>
            	<th><?php echo $data["uname"]; ?></th>
            </tr>
            <tr>
            	<th>E mail :</th>
            	<th><?php echo $data["e_mail"]; ?></th>
            </tr>
            <tr>
            	<th>Number :</th>
            	<th><?php echo $data["number"]; ?></th>
            </tr>
            <tr>
            	<th>Course :</th>
            	<th><?php echo $data["coursename"]; ?></th>
            </tr>
            <tr>
            	<th colspan="2"><center><a href="Register.php?eid=<?php echo $data["uid"]; ?>"><input type="submit" value="EDIT" name="edit"
                 class="btn btn-danger"></a></center></th>
            </tr>
        </table>
<br><br><br>
</div>
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
<!-- //banner -->
<!--//about-inner-->	
<?php include("footer.php"); ?>
<?php include("copyright.php"); ?>
<!-- smooth scrolling -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(            
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');        
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');       
						}
					);
				});
			</script>
<!-- //Dropdown-Menu-JavaScript -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- Countdown-Timer-JavaScript -->
			<script src="js/simplyCountdown.js"></script>
			<script>
				var d = new Date(new Date().getTime() + 948 * 120 * 120 * 2000);
				// default example
				simplyCountdown('.simply-countdown-one', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate()
				});
				// inline example
				simplyCountdown('.simply-countdown-inline', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					inline: true
				});
				//jQuery example
				$('#simply-countdown-losange').simplyCountdown({
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					enableUtc: false
				});
			</script>
<!-- //Countdown-Timer-JavaScript -->
<!-- Starts-Number-Scroller-Animation-JavaScript -->		
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //Starts-Number-Scroller-Animation-JavaScript -->
<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/						
			$().UItoTop({ easingType: 'easeOutQuart' });					
			});
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>