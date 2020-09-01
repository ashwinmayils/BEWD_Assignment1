<?php 
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM recipes";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
?>


<?php include "templates/header.php"; ?>

<h2>Results</h2>

<?php 
                // This is a loop, which will loop through each result in the array
                foreach($result as $row) { 
            ?>

<p>
    ID:
    <?php echo $row["id"]; ?><br> Recipe Name:
    <?php echo $row['recipename']; ?><br> Ingredients:
    <?php echo $row['ingredients']; ?><br> Recipe:
    <?php echo $row['recipe']; ?><br> Difficulty:
    <?php echo $row['difficulty']; ?><br>
    <a href='update-page.php?id=<?php echo $row['id']; ?>'>Edit</a>
</p>
<?php 
            // this willoutput all the data from the array
            //echo '<pre>'; var_dump($row); 
        ?>

<hr>
<?php }; //close the foreach

?>



<form method="post">

    <input type="submit" name="submit" value="View all">

</form>


<?php include "templates/footer.php"; ?>