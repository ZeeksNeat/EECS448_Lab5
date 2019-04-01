<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "z274d418", "so9bo9oX", "z274d418");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connection failed: " . $mysqli->connect_error);
        exit();
    }
    echo "<h1> Registered Users </h1>";
    $query = "SELECT user_id FROM Users";
        echo'<table><tr>';
    if ($result = $mysqli->query($query)) {
        
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
                echo '<tr><td> ';
            echo $row["user_id"];
                echo '</td></tr> ';
        }
        /* free result set */
        $result->free();
    } 
        echo'</tr></table>';
        echo " <br>";
        echo "<br><a href=\"AdminHome.html\" class=\"button\">Return to Admin Home</a>";
    /* close connection */
    $mysqli->close();
?> 