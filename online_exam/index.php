<?php include 'inc/header.php'; ?>

<?php
  Session::checkLogin();
?>

<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl" style="padding-left: 60px; padding-top: 65px">
			 <tr>
			   <td>E-mail:</td>
			   <td><input name="email" id="email" type="text" required="" placeholder="Enter Email"></td>
			 </tr>
			 <tr>
			   <td>Password:</td>
			   <td><input name="password" id="password" type="password" required="" placeholder="Enter Password"></td>
			 </tr>
			  <tr>
			  <td></td>
			   <td class="button_class"><input type="submit" id="loginSubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>

        <br/>
	   <p style="font-size: 16px; text-align: center;">Are You a New User? <a style="text-decoration: none" href="register.php">Register</a> Here</p>
        <br/>
        <p style="font-size: 14px; text-align: center;"><span class="empty" style="display: none">Fields Must Not be Empty!</span></p>
        <p style="font-size: 14px; text-align: center;"><span class="error" style="display: none">Email or Password Not Matched!</span></p>
        <p style="font-size: 14px; text-align: center;"><span class="disable" style="display: none">User ID Disabled From Admin!</span></p>

    </div>
	
</div>
<?php include 'inc/footer.php'; ?>