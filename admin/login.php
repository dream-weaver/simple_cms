
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<style>
#main {
width:960px;
margin:50px auto;
font-family:raleway
}
.error {
color:red
}
h2 {
background-color:#FEFFED;
text-align:center;
border-radius:10px 10px 0 0;
margin:-10px -40px;
padding:15px
}
hr {
border:0;
border-bottom:1px solid #ccc;
margin:10px -40px;
margin-bottom:30px
}
#login {
width:300px;
float:left;
border-radius:10px;
font-family:raleway;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px
}
input[type=text],input[type=password] {
width:99.5%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:raleway
}
input[type=submit] {
width:100%;
background-color:#FFBC00;
color:#fff;
border:2px solid #FFCB00;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
#profile {
padding:50px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7
}
#logout {
float:right;
padding:5px;
border:dashed 1px gray
}
a {
text-decoration:none;
color:#6495ed
}
i {
color:#6495ed
}
</style>
<?php
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
$error_username="";
$error_password="";

	if(isset($_POST['submit'])){
	
			//validate username fields
			if(empty($_POST['username'])){
				$error_username="UserName is required!";
			}
			if(empty($_POST['password'])){
				$error_password="Password is required";
			}

		}
	
?>
<div id="main">
<h1>PHP Login Session Example</h1>
<div id="login">
<h2>Login Form</h2>
<form action="login.php" method="post">
<label>UserName:*</label><span class="error"><?php echo $error_username; ?></span>
<input id="name" name="username" value="" placeholder="username" type="text">
<label>Password:*</label><span class="error"><?php echo $error_password; ?></span>
<input id="password" name="password" value="" placeholder="**********" type="password">
<input name="submit" type="submit" value="Login ">
</form>
</div>
</div>
</body>
</html>