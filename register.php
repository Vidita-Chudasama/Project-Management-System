<?php
	include("__Connection.php");
	
	if (isset($_REQUEST["reg"]))
	{
			$u=$_REQUEST["uname"];
			$p=base64_encode($_REQUEST["pass"]);
			$n=$_REQUEST["phone"];
			$e=$_REQUEST["email"];
			//$c=join(",",$_REQUEST["course"]);
			$c=$_REQUEST["course"];
			$photo="Profile/".$_FILES["photo"]["name"];
			
			$ins="insert into user_reg(uname,password,number,e_mail,photo,courseid) values('$u','$p','$n','$e','$photo','$c')";
			$ex=mysqli_query($conn,$ins);
			 
			
			if($ex)
			{
				$msg="User Added";
				move_uploaded_file($_FILES["photo"]["tmp_name"],$photo);
			}
			else
			{
				$msg="Try Again";
			}
			
	}
	if(isset($_REQUEST["eid"]))
	{
			$sel="select * from user_reg where uid=".$_REQUEST["eid"];
			$ex=mysqli_query($conn,$sel);
			$up=mysqli_fetch_assoc($ex);
	}
	if(isset($_REQUEST["update"]))
	{
			$u=$_REQUEST["uname"];
			$n=$_REQUEST["phone"];
			$e=$_REQUEST["email"];
			$c=$_REQUEST["course"];
			
			$updt="update user_reg set uname='$u' , number='$n' , e_mail='$e' , courseid='$c' where uid=".$_REQUEST["eid"];
			$ex=mysqli_query($conn,$updt);	
	
			header("location:profile.php");
	}
	
?>
<!--for checkbox in drop down-->
<!--/-->
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
<!-- for checkbox in drop down -->
</head>

<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
<div class="banner-overlay-agileinfo">
		<?php include("header.php"); ?>		
			<div class="container">
			<?php include("menu.php"); ?>		
				<h2 class="inner-tittle-w3layouts">
				<?php 
					if(!isset($_REQUEST["eid"])) 
					{
				?>
                Register
                <?php
					}
					else
					{
				?>
                Update Data
                <?php
					}
				?>
                </h2>
			</div>
</div>
</div>

<br><br>

<div class="container">
	 <div>
	<div class="form-bg-w3ls">
		<h3>
        <?php
			if(!isset($_REQUEST["eid"]))
			{
		?>
        Fill the register form
        <?php
			}
			else
			{
		?>
        Fill the update form
        <?php
			}
		?>
        </h3>
		<form method="post" enctype="multipart/form-data">
        	<table cellpadding="5" cellspacing="5" style="width:60%" align="center">
            	<caption class="para-w3-agile white-w3ls" ><?php echo $msg; ?></caption>
            	<tr>
           			<th>Username : </th>
                	<td><input type="text"  name="uname" placeholder="Full name" required  class="form-control" 
                    value="<?php echo $up["uname"]; ?>" /></td>
                </tr>
                <?php
					if(!isset($_REQUEST["eid"]))
					{
				?>
                <tr>
                	<th>Password : </th>
                	<td><input type="password" placeholder="Your Password"  name="pass" required class="form-control" /></td>
                </tr>
                <?php
					}
				?>
            	<tr>
                	<th>Phone No. : </th>
                	<td><input type="number" placeholder="Phone number"  name="phone" required class="form-control" 
                     value="<?php echo $up["number"]; ?>" /></td>
                </tr>
            	<tr>
                	<th>E-mail : </th>
                	<td><input type="email"  name="email" placeholder="Your E-mail" class="form-control" required
                    value="<?php echo $up["e_mail"]; ?>" /></td>
                </tr>
                <?php
					if(!isset($_REQUEST["eid"]))
					{
				?>
                <tr>
                	<th>Photo : </th>
                	<td><input type="file"  name="photo" class="form-control" /></td>
                </tr>
                <?php
					}
				?>
                <tr> 
                	<th>Select Course : </th>
                    <td>
                    <select class="form-control" name="course">
						<option value="Select a course">Select a course</option>
                        <?php
							$sel="select * from course";
							$ex=mysqli_query($conn,$sel);
							while($course=mysqli_fetch_assoc($ex))
							{
						?>
                        <option value="<?php echo $course["courseid"]; ?>" <?php if($course["courseid"]==$up["courseid"]) { echo "selected"; } ?> >
						<?php echo $course["coursename"]; ?>
                        </option>
                        <?php
							}
						?>
					</select>
                    </td>
                </tr>
                <?php
					if(!isset($_REQUEST["eid"]))
					{
				?>
                <tr>
					<th colspan="2"><input type="submit" value="Submit" class="button-w3layouts hvr-rectangle-out" name="reg"></th>
                </tr>
                <?php
					}
					else
					{
				?>
                <tr>
					<th colspan="2"><input type="submit" value="Update" class="button-w3layouts hvr-rectangle-out" name="update"></th>
                </tr>
                <?php
					}
				?>
            </table>
		</form>	
	</div>
	</div> 
	<div class="clearfix"></div>
</div>

<br><br>

<!-- //banner -->
<!-- //Register -->
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