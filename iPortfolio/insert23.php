<!DOCTYPE html>
<html>

<head>
	<title>Insert Page</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<style>
		body{
            background: #91d9ff;
			background-image: url("https://th.bing.com/th/id/R.695e00c57c85a92f52aa2cdf681847ca?rik=TZV9rB5uC6PvEw&riu=http%3a%2f%2fwww.thinkadmissions.com%2fcollege%2fcmrit-bangalore-admission.jpeg&ehk=1YraZ8a6%2fKGu7gWyFcfR%2bUgysYFD3KNNmHa1gR2MZQs%3d&risl=&pid=ImgRaw&r=0");
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<body>
<h1><a href="home.php" style="color: black; text-decoration:none"> 🔙 Dashboard </a></h1>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "dmpm");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		//$student_name = $_REQUEST['student_name'];
		$projectid = $_REQUEST['projectid'];
		//$project_description = $_REQUEST['project_description'];
		//$project_guide = $_REQUEST['project_guide'];
		//$review1 = $_REQUEST['review1'];
		//$review2 = $_REQUEST['review2'];
		$review3 = $_REQUEST['review3'];
		//$final_marks = $_REQUEST['final_marks'];

		// Performing insert query execution
		// here our table name is project_review
		//$sql = "UPDATE team SET review1='$review1', review2='$review2', review3='$review3' WHERE projectid='$projectid' ";

		$sql = "UPDATE team SET review3='$review3' WHERE projectid='$projectid' ";
		
		if(mysqli_query($conn, $sql)){
			echo "<h2>Data stored in a database successfully."
				. " Please browse your localhost phpmyadmin"
				. " to view the updated data</h2>";

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>

<br><br><br><br><br><br><br><br>

<h1><a href="index.php" style="color: black; text-decoration:none"> 🏠Go to HomePage </a></h1>
	</center>
</body>

</html>
