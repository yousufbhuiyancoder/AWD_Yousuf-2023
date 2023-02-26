<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>php Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Class-5 Form</h3>

				<?php

/*
PHP File Upload:

With PHP, it is easy to upload files to the server.

However, with ease comes danger, so always be careful when allowing file uploads!


Some rules to follow for the HTML form above:

Make sure that the form uses method="post"
The form also needs the following attribute: enctype="multipart/form-data". It specifies which content-type to use when submitting the form
Without the requirements above, the file upload will not work.

Other things to notice:

The type="file" attribute of the <input> tag shows the input field as a file-select control, with a "Browse" button next to the input control
The form above sends data to a file called "upload.php", which we will create next.


*/

				if(isset($_POST['submit'])){

					$tmp_file = $_FILES['image']['tmp_name']; // which file will be uploaded: temporary file

					$fileExt = explode('.', $_FILES['image']['name']); // which type (png or jpeg...file extension) will be uploaded

					$fileExt = end($fileExt); // last explode item (since last was name)

					$fileName = uniqid().'-'. time().'.'.$fileExt; //Generating unique file name as all the uploaded files's name can't same.
					
					move_uploaded_file($tmp_file, "uploaded/".$fileName);// please be carefull for the comma (,) and dot (.) sign.

					echo "File Uploaded! ";

					// print_r($_FILES);exit();

					if($_POST['username'] != '' && $_POST['password'] != ''){

					$name = "yousuf"; // this is set for credential check like user has provided the username & saved it to server accordingly.
					$pass = "1234";// this is set for credential check like user has provided the password & saved it to server accordingly.

					if($_POST['username'] == $name && $_POST['password'] == $pass)
					{
						echo "Hi! You are logged in ". $name;
					}else{
						echo "<p class = 'alert alert-danger'>Credentials does not match!</p>";
					}

				}else{
					echo "<p class = 'alert alert-warning'>Must fill all the empty spaces.</p>";}
				}
				
				?>


				<form class="form-group" action="" method="POST" enctype="multipart/form-data">

					<label>Username:</label>

					<input class="form-control" type="text" name="username">

					<label>Password:</label>

					<input class="form-control" type="password" name="password">

					
					<label>Choose a car:</label>
						<select name="cars" id="cars" class="form-control">
							  <option value="volvo">Volvo</option>
							  <option value="saab">Saab</option>
							  <option value="fiat">Fiat</option>
							  <option value="audi">Audi</option>
						</select>

					
					<input class="mt-2" type="file" name="image" accept="image/*">


					<input class="btn btn-success btn-block mt-4" type="submit" name="submit" value="Register">

				</form>


			</div>
		</div>
	</div>


</body>
</html>