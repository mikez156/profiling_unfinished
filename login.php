<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div style="padding: 70px;">
   <table style="margin: 0 auto;">  
       <thead>
         <tr>
            <td colspan="2" style="margin: 0 auto; text-align:center">
                <div>
                    <h2>Login</h2>
                </div>
            </td>
        </tr> 
    </thead>
    <tbody>
	<form method="post" action="login.php">
        <tr>
            <td><label>Username</label></td>
            <td><input type="text" name="username" ></td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><?php echo display_error(); ?></td>
        </tr>
	
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align:right;">
			<button type="submit" class="btn btn-primary" name="login_btn">Login</button>
            </td>
        </tr>
    </tfoot>
</form>
   </table> 
    <p>
			<!--Not yet a member? <a href="register.php">Sign up</a>-->
		</p> 
    </div>
</div>
</body>
</html>