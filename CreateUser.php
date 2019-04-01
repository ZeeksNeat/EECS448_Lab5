<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "z274d418", "so9bo9oX", "z274d418");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: " . $mysqli->connect_error);
        exit();
    }
    $query = "SELECT user_id FROM Users";
    $username = $_POST['username'];
    $userExists = FALSE;
    if ($result = $mysqli->query($query)) {
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            
            //case insensitive!! 
            if(strcasecmp($row["user_id"], $username) == 0) {
                $userExists = TRUE;
            } 
        }
        /* free result set */
        $result->free();
    } 
    if( $userExists ) {
        echo "<br>Username already exists<br>";
        echo "<a href=\"CreateUser.html\" class=\'button\">Create new user</a><br>";
    } else if ($username == NULL){
        echo "Username cannot be blank<br>";
        echo "<a href=\"CreateUser.html\" class=\'button\">Create new user</a><br>";
    } else {
        $mysqli->query("INSERT INTO Users (user_id) VALUES ('$username');");
        echo "User ".$username." created successfully<br>";
        echo "<a href=\"CreatePosts.html\" class=\"button\">Create new post</a><br>";
    }
    /* close connection */
    $mysqli->close();
?> 