<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "z274d418", "so9bo9oX", "z274d418");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: " . $mysqli->connect_error);
        exit();
    }
    $existing_user = $mysqli->real_escape_string($_REQUEST['username']);
    $content = $mysqli->real_escape_string($_REQUEST['post']);
    $query = "SELECT * FROM `Users` WHERE `user_id`=`$existing_user` ";
        $result = mysql_query($query);
    if (!mysql_num_rows($result)){
        $sql = "INSERT INTO Posts (author_id, content)
        VALUES ('$existing_user','$content')";
        if ($mysqli->query($sql) == true) {
                //Check if entry was entered into DB
                echo "New record created successfully";
              } else {
                echo "Error: " . $mysqli . "<br>" . $mysqli->error;
              }
            }
            else {
              echo "ID doesn't exist... go to create user page";
            }
    echo "<br><br><a href=\"AdminHome.html\" class=\"button\">Home</a>";
    /* close connection */
    $mysqli->close();
?> 