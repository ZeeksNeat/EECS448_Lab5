<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "z274d418", "so9bo9oX", "z274d418");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: " . $mysqli->connect_error);
    exit();
}
$postIds = array();
$length = 0;
if(!empty($_POST['delete'])) {
    foreach($_POST['delete'] as $check) {
            $postIds[$length] = $check; 
			$length++;
    }
}

echo "<h1> Deleted Posts </h1>";

$query = "SELECT Posts.author_id, Posts.post_id, Posts.content FROM Users INNER JOIN Posts ON Users.user_id=Posts.author_id ORDER BY Posts.post_id";
if ($result = $mysqli->query($query)) {
		echo "<table><tr><th>Post Id</th><th>Post Author</th><th>Post Content</th></tr>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		for($x = 0; $x < count($postIds); $x++) {
			if($row["post_id"] == $postIds[$x]) {
				echo "<td>".$row["post_id"]."</td>";
				echo "<td>".$row["author_id"]."</td>";
				echo "<td>".$row["content"]."</td></tr>";
			}
		}
    }
	echo "</table>";
	for($y = 0; $y < count($postIds); $y++) {
		
		$mysqli->query("DELETE FROM Posts WHERE post_id=$postIds[$y];");
	}
    /* free result set */
    $result->free();
} 
	echo " <br>";
	echo "<a href=\"AdminHome.html\" class=\"button\">Return to Admin Home</a>";
/* close connection */
$mysqli->close();
?>  