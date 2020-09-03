<?php 
ob_start();

    // include the config file that we created last week
    require "../config.php";
    require "common.php";

    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
        $work =[
            "id"         => $_POST['id'],
            "recipename" => $_POST['recipename'],
            "ingredients"  => $_POST['ingredients'],
            "recipe"   => $_POST['recipe'],
            "difficulty"   => $_POST['difficulty'],
            "date"   => $_POST['date'],
        ];
    
        // create SQL statement
        $sql = "UPDATE recipes 
                SET id = :id, 
                    recipename = :recipename, 
                    ingredients = :ingredients, 
                    recipe = :recipe, 
                    difficulty = :difficulty, 
                    date = :date 
                WHERE id = :id";
    
        //prepare sql statement
        $statement = $connection->prepare($sql);
    
        //execute sql statement
        $statement->execute($work);
            
            } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        // quickly show the id on the page
        echo $_GET['id'];

        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM recipes WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
    } else {
        // no id, show error
        echo "No ID - Unkown Error";
        //exit;
    }
?>

<?php include "templates/header.php"; ?>

<form method="post" class="subHeading">
    
    <label for="id">ID:</label>
    <input class="subHeading2" type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
    
    <label for="recipename">Recipe Name:</label>
    <input class="subHeading2" type="text" name="recipename" id="recipename" value="<?php echo escape($work['recipename']); ?>">
    <br>
    <label for="ingredients">Ingredients:</label>
    <input class="subHeading2" type="text" name="ingredients" id="ingredients" value="<?php echo escape($work['ingredients']); ?>">

    <label for="recipe">Recipe:</label>
    <input class="subHeading2" type="text" name="recipe" id="recipe" value="<?php echo escape($work['recipe']); ?>">
    <br>
    <label for="difficulty">Difficulty:</label>
    <input class="subHeading2" type="text" name="difficulty" id="difficulty" value="<?php echo escape($work['difficulty']); ?>">
    
    <label for="date">Date Added:</label>
    <input class="subHeading2" type="text" name="date" id="date" value="<?php echo escape($work['date']); ?>">
    <br>
    <input class="subHeading2" type="submit" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>