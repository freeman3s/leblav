<?php
require_once 'db.php'; 

$query = 'SELECT * FROM todo ORDER BY id asc';
$results = mysqli_query($link, $query) or die('Query error.');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Task 2</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/scripts.js"></script> 
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container">
		<table class="table table-striped" id="table">
			<caption><h1>To-Do List</h1></caption>
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Operations</th>
				</tr>
			</thead>
			<tbody>
					<?php if ($results->num_rows) {
						$row = $results->fetch_object();
					?>
						<?php foreach ($results as $row) { ?>
							<tr>
								<td><?php print $row['title'] ?></td>
								<td><?php print $row['description'] ?></td>
								<td><a href="delete.php?id=<?php print $row['id'] ?>" class="deleteEntry">Delete</a></td>
							</tr>
						<?php } ?>
					<?php } else { ?>
						<p>There are zero items. Add one now!</p>
					<?php } ?>
			</tbody>
		</table>
		<hr>
		<h3>Add New Entry</h3>
		<form action="add.php" method="post" accept-charset="utf-8">
	    <p>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
	    </p>
	    <p>
	      <label for="description">Description</label>
	      <textarea name="description" id="description" rows="10" cols="35"></textarea>
	    </p>
	    <p>
	      <input type="submit" name="addEntry" id="addEntry" class="addEntry" value="Add New Entry">
	    </p>
		</form>
	</div>
</body>
</html>