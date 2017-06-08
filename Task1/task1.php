<?php
$rss = 'https://ain.ua/feed';
$xml = @simplexml_load_file($rss);
if ($xml === false) {
	die('Error parse RSS: ' . $rss);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Task 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<caption><h1>News from AIN.UA</h1></caption>
			<thead>
				<tr>
					<th>Title</th>
					<th>pubDate</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach ($xml->xpath('//item') as $item) { ?>
						<tr>
							<td><a href="<?php print $item->link ?>"><?php print $item->title ?></a></td>
							<td><?php print $item->pubDate ?></td>
							<td><?php print $item->description ?></td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>