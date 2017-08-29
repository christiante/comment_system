<h2>Spam list</h2>

<?php
	echo "<table class='table table-hover'>";
	echo "
		<tr class='active'>
			<td class='col-lg-3'><b>User name</b></td>
			<td class='col-lg-3'><b>Spam comment</b></td>
			<td class='col-lg-3'><b>Date</b></td>
		</tr>";

	class TableRows extends RecursiveIteratorIterator {
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}

		function current() {
			return "<td>" . parent::current(). "</td>";
		}

		function beginChildren() { 
			echo "<tr>"; 
		} 

		function endChildren() { 
			echo "</tr>" . "\n";
		} 
	} 

	$servername = "localhost";
	$username 	= "root";
	$password 	= "";
	$dbname 	= "comment_system";

	try {
		$conn 	= 	new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn	->	setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt 	= 	$conn->prepare("SELECT user, text, date FROM spam_comments"); 
		$stmt	->	execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
			echo $v;
		}
	}

	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;
	echo "</table>";
?>
