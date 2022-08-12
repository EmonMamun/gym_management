<?php
	session_start();

	require_once('../models/UserModel.php');

	if(isset($_POST['login'])){

		$m_email = $_REQUEST['email'];
		$m_password = $_REQUEST['password'];

		$result=validateUser();

		while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)){

			$password=$row['PASSWORD'];
			$type=$row['TYPE'];
			$name=$row['NAME'];
			$email=$row['EMAIL'];
			$address=$row['ADDRESS'];
			$gender=$row['GENDER'];
			$qualification=$row['QUALIFICATION'];
		
		

		if($m_email==$email and $m_password==$password){

				

		    	if($type=='manager' || $type=='Manager'){
			 		$_SESSION['flag']= true;

			
					$_SESSION['type']=$type;

					header("location:../views/dummydashboard.php");

				}else if ($type=='Member' || $type=='Trainer') {
					$_SESSION['flag']= true;

					$_SESSION['type']=$type;

					header("location:../views/dummydashboard.php");

				}else{
					echo "Missing...";
				}
			}else{
				

				$check='Invalid User';
			}
		}

		if($check){
			echo $check;
		}

		
		oci_free_statement($result);
		
	}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login Page</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="../assets/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="../assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <script src="../assets/js/jquery.min.js" type="text/javascript"></script>

    </head>

    <body>
		<img src="../assets/images/logo.jpg" alt="#" style="width:150px;height:150px;">

        <div id="wrapper">
			<div id="page-" class="col-md-4 col-md-offset-4">
				<form method="post" action="login.php">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">Sign In</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="email" class="form-control" required="required" value="">
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" name="password" class="form-control" required="required" value="">
							</div>
						
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox">Remember Me
								</label>
							</div>
							
	
						
							<button type="submit" name="login" class="btn btn-success">Login</button>&nbsp&nbsp
							<label>Create new Account ? <a href="regCheck.php">SignUp </a></label>
						</div>
					</div>
				</form>
				
							  
			</div>
		</div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->

        <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/js/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/js/sb-admin-2.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
</body>

</html>
