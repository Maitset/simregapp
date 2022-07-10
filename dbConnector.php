<?php 
/* Configure Database */
     $conn = 'mysql:dbname=in4techgalaxyco_simregls;host=http://localhost/'; //database name
     $user = 'in4techgalaxyco_simregls'; // your mysql user 
     $password = '@77585010eI'; // your mysql password

     //  Create a PDO instance that will allow you to access your database
     try {
        $db = new PDO($conn, $user, $password);
     }

    catch(PDOException $e) {
     //var_dump($e);
        echo("PDO error occurred");
    }

    catch(Exception $e) {
    //var_dump($e);
    echo("Error occurred");
    }
    

   session_start();


?>

