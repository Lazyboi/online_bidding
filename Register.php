<html>
<head>
<link rel="stylesheet type = "text/css" href="css/register.css">


</head>

<body >

<div id = "content">
<img class = "logo"src = "images/perpetual-logo.png">
<div class = "top">
<h4 class = "already"> Home</h4>  <a  class = "already" href = "adminindex.php">Back</a>
<h2 class = "signup"> Sign up now!</h2>

<article class = "free"> It's Free to Register in this website, Register Now!</article>
</div>
<div id ="contentmid">
<div class = "maincontent">
<form name = "frm" action = "functions/registerfunction.php" method = "POST">
	<h2 class = "acc">Register For Your Account</h2>
	

	<h3 class = "CI">Contact Information</h3>
	
	<article class = "fname"> First name</article>
	<input class = "fname"type  = "textbox" name = "fname" required = "required"> 
	
	<article class = "lname">Last name</article>
	<input class = "lname" type = "textbox" name = "lname" required = "required">
	
	<article class = "course">Course</article>
	
<select name = "course" class = "course">
<option>Automotive Servicing (NCI) (Technical Vocatinal Education and Training )</option>
<option>Aviation Electronics Technology (AET)</option>
<option>Aviation Maintenance Technology (AMT)</option>
<option>Bachelor in Elementary Education</option>
<option>Bachelor in Elementary Education Major in PreschoolBachelor in Secondary Education</option>
<option>Bachelor in Secondary Education</option>
<option>Bachelor in Secondary Education Major in English</option>
<option>Bachelor in Secondary Education Major in MAPEH</option>
<option>Bachelor in Secondary Education Major in Mathematics</option>
<option>Bachelor in Secondary Education Major in Social Studies</option>
<option>Bachelor of Arts in Communication</option>
<option>Bachelor of Arts in Political Science</option>
<option>Bachelor of Arts in Psychology</option>
<option>Bachelor of Science (BS) Criminology</option>
<option>Bachelor of Science (BS) in Computer Science</option>
<option>Bachelor of Science (BS) in Information Technology</option>
<option>Bachelor of Science in Aeronautical Engineering (BSAE)</option>
<option>Bachelor of Science in Civil Engineering</option>
<option>Bachelor of Science in Computer Engineering</option>
<option>Bachelor of Science in Electrical Engineering</option>
<option>Bachelor of Science in Electronics and Communications Engineering</option>
<option>Bachelor of Science in Hotel and Restaurant Management</option>
<option>Bachelor of Science in Hotel and Restaurant Management</option>	
<option>Bachelor of Science in Industrial Engineering</option>
<option>Bachelor of Science in Mechanical Engineering</option>
<option>Bachelor of Science in Radiologic Technology</option>
<option>Bachelor of Science in Respiratory Therapy</option>
<option>Bachelor of Science in Tourism</option>
<option>Bachelor of Science in Tourism</option>
<option>BS in Accountancy</option>
<option>BSBA in Human Resource Management</option>
<option>BSBA in Marketing Management</option>
<option>Business Administration and Accountancy (Bachelor)</option>
<option>Consumer Eletronics Servicing (NCII) (Technical Vocatinal Education and Training )</option>
<option>Consumer Hardware Servicing (NCII) (Technical Vocatinal Education and Training )</option>
<option>Doctor of Dental Medicine</option>
<option>Doctor Of Medicine</option>
<option>Electrical Installation and Maintenance (NC-II) (Technical Vocatinal Education and Training )</option>
<option>International Hospitality Management and Tourism (Bachelor)</option>
<option>Law (Bachelor)</option>
<option>Maritime Studies (Bachelor)</option>
<option>Nursing and Midwifery (Bachelor)</option>
<option>Occupational Therapy (Bachelor)</option>
<option>Pharmacy (Bachelor of Science)</option>
<option>Physical (Bachelor)</option>
<option>Physical & Occupational Therapy (Bachelor)</option>
<option>Radiologic Technology (Bachelor)</option>
<option>Refrigeration and Air - conditioning (NCII) (Technical Vocatinal Education and Training )</option>
<option>Respiratory Therapy (Bachelor)</option>


</select>

	<article class = "studnumber">Student number</article>
	<input class = "studnumber"type = "textbox" name = "studnumber" required = "required">
	
		<article class = "cadd">Contact address </article>
	<input class = "cadd"type = "textbox" name = "caddress" required = "required">

	<article class = "cnum">Contact phone number</article>
	<input class = "cnum"type = "number" name = "cnumber" required = "required">
	
		<article class = "email">Email</article>

		<input class = "email" type  = "textbox" name="email" required = "required" placeholder = "example@example.com">
<script type="text/javascript">
function val(){
if(frm.email.value=="")
{
	alert("Please enter the email");
	frm.email.focus();	
	return false;
}	
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

if (reg.test(frm.email.value) == false) 
{
	alert('Invalid email address');
	frm.email.focus();	
	return false;
}

return true;
}
</script>
	<h3 class = "up"> Username and password</h3>
	
	<article class = "user"> Username</article>
	<input class =  "user"type = "textbox" name = "username" required = "required">
	<script>
	function val(){
if(frm.password.value == "")
{
	alert("Enter the Password.");
	frm.password.focus(); 
	return false;
}
if((frm.password.value).length < 8)
{
	alert("Password should be minimum 8 characters.");
	frm.password.focus();
	return false;
}

if(frm.confirmpassword.value == "")
{
	alert("Enter the Confirmation Password.");
	return false;
}
if(frm.cpassword.value != frm.password.value)
{
	alert("Password confirmation does not match.");
	return false;
}

return true;
}
</script>	
	<article class = 'pass' > Password</article>
	<input type="password" name="password" class =  'pass' required = 'required'/>
	
	<article class = 'cpass'> Confirm password</article>
	<input type="password" name="cpassword" class = 'cpass' required = 'required'/>

	
	<p class = "agreement">The products to be sold are strictly for school purposes only (academic / co-curricular).</p>
		
    <input class = "submit" type = "submit" name = "submit" value = "Create account and continue" onclick="return val();" />
	
	
	</form>
	
</div>
	</div>
<div id = "footer">
<a href = "index.php"><img class = "footerlogo" src = "images/logo1.jpg"></a>
<h1 class = "one"> Buying and Selling <br> Online Since 2016</h1>

<div class = "nav-footer">
<h2 class = "comment">Comments from Website</h2>
<h2 class = "links"> Quick Links</h2>
<ul>
<li><a class = "dark" href ="index.php">Home</a></li>
<?php  if (empty($_SESSION)){
	
	echo '
<li><a class = "dark"href ="signin.php">Sell</a></li>';
}
else {
	echo'
	<li><a class = "dark"href ="sell.php">Sell</a></li>';

}
?>
<li><a class = "dark"href ="Categories.php">Buy</a></li>
</ul>
</div>
<p class = "comment"><i>"Just sold an item here. This auction site <br>is so awesome the transaction is fast and easy. <br>I hope more members will use this."</i></p>
<article class = "ramon"><i> - ramon x earl69</i> </article> 
<h2 class = "socialmedia"> Social Medias</h2> 
<ul class = "social">

<li><a href ="http://www.facebook.com"><img class = "social" src = "images/facebook.png"></a></li>
<li><a href ="http://www.twitter.com"><img class = "social" src = "images/twitter.ico"></a></li>
<li><a href ="http://www.googleplus.com"><img class = "social" src = "images/download.jpg"></a></li>
<li><a href ="http://www.pinterest.com"><img class = "social" src = "images/pinterest.png"></a></li>
</ul>

</div>
	</div>
</form>
</body>
</html>