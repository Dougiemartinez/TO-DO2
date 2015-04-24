<?php
    // require database file in the model folder
    require_once(__DIR__ . "/../model/config.php");
    

     $query = $_SESSION["connection"]->query("CREATE TABLE users ("
              . "id int(11) NOT NULL AUTO_INCREMENT,"
              .  "username varchar(30) NOT NULL,"
              .  "password char(128) NOT NULL,"
              .  "salt char(128) NOT NULL,"
              .  "PRIMARY KEY (id))");

     if ($query) {
        echo "<p>Successfully created table: users</p>";
     }
     else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
     }


    
   
 