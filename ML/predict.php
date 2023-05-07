<!DOCTYPE html>
<html>
<head>
	<title>ML Prediction</title>
</head>
<body>

	<h1>ML Prediction Form</h1>

	<form method="post">
		<label for="review1">Review 1:</label>
		<input type="text" id="review1" name="review1"><br><br>

		<label for="review2">Review 2:</label>
		<input type="text" id="review2" name="review2"><br><br>

		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
		if(isset($_POST['submit'])){
			$review1 = $_POST['review1'];
			$review2 = $_POST['review2'];

			$data = array('Review1' => $review1, 'Review2' => $review2);

			$options = array(
			    'http' => array(
			        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($data),
			    ),
			);

			$context  = stream_context_create($options);
			$result = file_get_contents('http://127.0.0.1:5000/predict', false, $context);
			echo "<br>Prediction: " . $result;
		}
	?>

</body>
</html>
