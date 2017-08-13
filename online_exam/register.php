<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table style="padding-left: 60px; padding-top: 25px">
		<tr>
           <td>Name:</td>
           <td><input type="text" name="name" id="name" required="" placeholder="Enter Name"></td>
         </tr>
		<tr>
           <td>Username:</td>
           <td><input name="name" type="text" id="username" required="" placeholder="Enter Username"></td>
         </tr>
         <tr>
           <td>Password:</td>
           <td><input type="password" name="password" id="password" required="" placeholder="Enter Password"></td>
         </tr>
            <tr>
                <td>E-mail:</td>
                <td><input name="email" id="email" type="text" required="" placeholder="Enter Email"></td>
            </tr>
         <tr>
           <td></td>
           <td class="button_class"><input type="submit" id="regSubmit" value="Register">
           </td>
         </tr>
       </table>
	   </form>

        <br/>
        <p style="font-size: 16px; text-align: center">Already Registered? <a style="text-decoration: none" href="index.php">Login</a> Here</p>
        <br/>
        <p style="font-size: 14px; text-align: center;"><span id="state"></span></p>
	</div>

</div>
<?php include 'inc/footer.php'; ?>