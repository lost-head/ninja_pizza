<?php 

	session_start();

	include('config/db_connect.php');

	$title = $email = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');

//method GET:
/*	if(isset($_GET['submit'])){
		echo $_GET['email'];
		echo $_GET['title'];
		echo $_GET['ingredients'];
	}*/

	//method POST:
	if(isset($_POST['submit'])){
		
		//check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required <br />';
		} else {
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'email must be a valid email address';	
			}		
		}	

		//check title
		if(empty($_POST['title'])){
			$errors['title'] = "An title is required <br />";
		} else {
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be a spaces and letters only';
			}
		}
			//check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = "An least on ingredient is required <br />";
		} else {
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}

		//check are there any errors in the form
		if(array_filter($errors)){
			//echo "errors in the form";
		} else {

			//to save our data into database
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			//create new variable sql to add date to db
			$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')"; 

			//save to db and check
			if(mysqli_query($conn, $sql)){
				//success
					header('Location: index.php'); //redirection to index page if form is valid
			} else {
				//error
				echo 'query error:' . musqli_error($conn);
			}	
		}
	} //end of POST check

?>
<!DOCTYPE html>
<html lang="en">

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Pizza</h4>
		<form action="add.php" method="POST" class="white"> <!-- action="add.php" can be changed to superglobal action="<?php echo $SERVER['PHP_SELF']; ?>" -->
			<label for="">Your Email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"> 
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label for="">Pizza Title:</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">	
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label for="">Ingredients (comma separated):</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

	
</html>