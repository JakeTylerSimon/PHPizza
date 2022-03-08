<?php

    $title = $email = $ingredients = '';
    $errors = array('email' => '', 'title' => '', 'ingredients' => '');

    if(isset($_POST['submit'])) {
        
        if(empty($_POST['email'])) {
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a volid email address.';
            }
        }
        
        if(empty($_POST['title'])) {
            $errors['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = ' Title must be letters and spaces only.';
            }
        }
        
        if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required <br />';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}

        if(array_filter($errors)){
            // echo 'Errors in the form';
        } else {
            header('Location: index.php');
        }
    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>
    
    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label>Your Email:</label>
            <input name="email" type='text' value="<?php echo $email ?>" >
            <div class="red-text">
                <?php echo $errors['email']; ?>
            </div>
            
            <label>Pizza Title:</label>
            <input name="title" type='text' value="<?php echo $title ?>" >
            <div class="red-text">
                <?php echo $errors['title']; ?>
            </div>
            
            <label>Ingredients (comma seperated):</label>
            <input name="ingredients" type='text' value="<?php echo $ingredients ?>" >
            <div class="red-text">
                <?php echo $errors['ingredients']; ?>
            </div>

            <div class="center">
                <input value="submit" type="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
</html>