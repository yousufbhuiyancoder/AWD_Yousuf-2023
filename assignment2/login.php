<?php include 'header.php'; ?>

<?php include 'core/user.php'; ?>



<div class="container">
	
	<div class="row">
		
		<div class="col-6 offset-3 mt-5">

				<h3>Login</h3>

				<?php 
				
					if(isset($_POST['submit'])){
						$user = new user;

						$checkOneUser = $user->checkOneUser($_POST['username'],$_POST['password']);
												

						if(count($checkOneUser) == 1){
						
							//Session
							$getUserId = $checkOneUser[0]['id']; 
							$getUsername = $checkOneUser[0]['username'];
						
							//SET TO SESSION
							session_start();
							$_SESSION['user_id'] = $getUserId;
							$_SESSION['username'] = $getUsername;

							header("location:index.php");


						}else{
							echo "<p class = 'alert alert-danger'>Credential Does not Match!</p>";
						}
		
					}
				?>

			<form action="" method="POST">
					  <div class="form-group">
						    <label for="exampleInputEmail1">User Name</label>
						    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
					  </div>
					  
					  <div class="form-group">
						   

					   </div>

					  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
					  </div>
					  					  
					  <button type="submit" name="submit" class="btn btn-primary">Login</button>

					  <span><a href="register.php">register</a></span>
			</form>


		</div>

	</div>

</div>


<?php include 'footer.php'; ?>