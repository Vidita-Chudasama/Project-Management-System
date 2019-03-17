<?php
	include("__Connection.php");
	
	if(!isset($_SESSION["unm"]))
	{
			header("location:index.php");
	}
	$c1=mysqli_query($conn,"select * from user_reg where uid='".$_SESSION["id"]."'");
	$c=mysqli_fetch_assoc($c1);
	if(isset($_REQUEST["submit"]))
	{
			$dt=date("Y-m-d");
			$pth="Practical/".$_FILES["pr_file"]["name"];
			$id=$_SESSION["id"];
			$cid=$c["courseid"];
			$pid=$_REQUEST["pr_nm"];
			
			$ins="insert into submitted_pr(spdate,upath,courseid,userid,practicalid) values('$dt','$pth','$cid','$id','$pid')";
			$ex=mysqli_query($conn,$ins);
			
			if($ex)
			{
				$msg="Practical Submitted";
				move_uploaded_file($_FILES["pr_file"]["tmp_name"],$pth);
			}
			else
			{
				$msg="Try Again";
			}
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
<!-- for editor -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        
<!-- //for editor -->
</head>
<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
	<div class="banner-overlay-agileinfo">
	<?php include("header.php"); ?>		
			<div class="container">
				<?php include("menu.php"); ?>
				<h2 class="inner-tittle-w3layouts">Welcome <?php echo $_SESSION["unm"]; ?></h2>
			</div>
	</div>
</div>
<!-- //banner -->
<div class="w3l_inner_section about-w3layouts">
<div class="container">

	<div class="col-md-9">
		<h3 class="tittle-agileits-w3layouts">Editor</h3>
<form method="post" enctype="multipart/form-data">        
        <table>
        <caption><?php echo $msg; ?></caption>
    		<tr><td>Text File : </td></tr>
            <tr>
                <td colspan="3">
                    <textarea id="inputTextToSave" cols="80" rows="20" style="resize:vertical;"></textarea>
                </td>
            </tr>
            <tr>
                <td>Filename to Save As:</td>
                <td><input id="inputFileNameToSaveAs"></input></td>
                <td><button onclick="saveTextAsFile()" >Save Text to File</button></td>
            </tr>
            <br><br>
            <tr>
                <td>Select a File to Submit:</td>
                <td>
                	<table>
                    	<tr>
                        	<td><input type="file" name="pr_file" required ></td>
                        </tr>
                        <tr>
                        	<td>
                            	<select name="pr_nm" >
                                <option value="Select Practical Name">Select Practical Name</option>
                                <?php 
									$str2="select * from send_pr join user_reg on user_reg.courseid=send_pr.courseid where uname='".$_SESSION["unm"]."'";
									$ex=mysqli_query($conn,$str2);
									while($pr=mysqli_fetch_assoc($ex))
									{
								?>
                                	<option value="<?php echo $pr["pid"] ?>"><?php echo $pr["pname"] ?></option>
                                <?php
									}
								?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
                <td><button name="submit">Send Selected File</button></td>
            </tr>
        </table>
</form>
<script type="text/javascript">
 
function saveTextAsFile()
{
    var textToSave = document.getElementById("inputTextToSave").value;
    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
    var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
 
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    downloadLink.href = textToSaveAsURL;
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
 
    downloadLink.click();
}
 
function destroyClickedElement(event)
{
    document.body.removeChild(event.target);
}
 
</script>
        
        		<div class="clearfix"> </div>
	</div>
    
	<div class="col-md-3 agile-blog-sidebar" style="border:double #FF6600 ; background-color:#9FF ; height:500px">
		<div class="w3l-blog-list">
        	<table>
            	<tr>
                	<th><h4><i class="fa fa-bell"></i></h4></th>
                    <th colspan="2"><h4>Notifications</h4></th>
                </tr>
                <tr>
                	<th colspan="3"><hr color="#000033" size="4"></th>
                </tr>
                <?php 
					$str="select pname,uname,fpath,totalmks from send_pr join user_reg where send_pr.courseid = user_reg.courseid ";
					$ex=mysqli_query($conn,$str);
					while($data=mysqli_fetch_assoc($ex))
					{
				?>
                <tr>
					<?php
						if($data["uname"]==$_SESSION["unm"]) 
						{
					?>
							<th><i class="fa fa-long-arrow-right"> </i></th>
                    		<th>
								<?php echo $data["pname"]; ?> <font size="-2">(<?php echo $data["totalmks"]; ?> <font size="-3"> mks </font>)</font>
							</th>
                    		<th><a href="Faculty/faculty/<?php echo $data["fpath"] ?>" download ><i class="fa fa-download"></i></a></th> 
                    <?php
						}
					?>
                </tr>
                <?php
					}
				?>
            </table>
			<div class="clearfix"> </div>
		 </div>
		<div class="clearfix"> </div>
	</div>
    	</div>
</div>
<?php include("footer.php"); ?>
<?php include("copyright.php"); ?>
<!-- smooth scrolling -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- responsiveslides -->
<script src="js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<!-- //responsiveslides -->
<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!-- contact-effect -->
<script src="js/classie.js"></script>
<script>
	(function() {
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}
		[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}
			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );
		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}
		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();
</script>
<!-- //contact-effect -->
 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});s
	});
</script>
<!-- start-smoth-scrolling -->
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