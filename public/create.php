
<?php
ob_start();
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
// include the config file that we created before
require "../config.php";

try {

// FIRST: Connect to the database
$connection = new PDO($dsn, $username, $password, $options);

// SECOND: Get the contents of the form and store it in an array
$new_recipe = array(
"recipename" => $_POST['recipename'],
"ingredients" => $_POST['ingredients'],
"recipe" => $_POST['recipe'],
"difficulty" => $_POST['difficulty'],
);

// THIRD: Turn the array into a SQL statement
$sql = "INSERT INTO recipes (recipename, ingredients, recipe, difficulty) VALUES (:recipename, :ingredients, :recipe, :difficulty)";

// FOURTH: Now write the SQL to the database
$statement = $connection->prepare($sql);
$statement->execute($new_recipe);
} catch(PDOException $error) {

    echo $sql . "<br>" . $error->getMessage(); // if there is an error, tell us what it is

}

}

?>

<?php include "templates/header.php"; ?>

<h2 class="subMainTitle">Add a Recipe</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p class="subtitle">Recipe successfully added!</p>
<?php } ?>

<form method="post" class="subHeading">
<label for="recipename">Recipe Name:</label> 
<input class="subHeading2" type="text" name="recipename" id="recipename">
<label for="ingredients">Ingredients:</label> 
<input class="subHeading2" type="text" name="ingredients" id="ingredients"><br> 
<label for="recipe">Recipe:</label> 
<input class="subHeading2" type="text" name="recipe" id="recipe">
<label for="difficulty">Difficulty:</label> 
<input class="subHeading2" type="text" name="difficulty" id="difficulty"><br> 
<input class="subHeading2" type="submit" name="submit" value="Submit">
</form>


<?php include "templates/footer.php"; ?>