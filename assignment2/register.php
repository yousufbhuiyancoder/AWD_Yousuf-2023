<?php include 'header.php'; ?>

<?php include 'core/user.php'; ?>

<div class="container">
	
	<div class="row">
		
		<div class="col-6 offset-3 mt-5">

				<h3>Register Here</h3>

				<?php 
				
					if (isset($_POST['submit'])){
						$user = new user;
						$userCount = $user->checkPreviousUser($_POST['username'],$_POST['email']);

						if(count($userCount) > 0){
							echo "<p class = 'alert alert-warning'>Username/Email Exists </p>";
						}else{
							$user->register($_POST['username'],$_POST['email'],md5($_POST['password']));
							echo "<p class='alert alert-success'>Register Successfully</p>";
							}

						} 

				?>

			<form action="" method="POST">
					  <div class="form-group">
						    <label for="exampleInputEmail1">User Name</label>
						    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
					  </div>
					  
					  <div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
						    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					   </div>

					  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
					  </div>
					  					  
					  <button type="submit" name="submit" class="btn btn-primary">Register</button>

					  <span><a href="login.php">Login</a></span>

			</form>


		</div>

	</div>

</div>

<?php include 'footer.php'; ?>