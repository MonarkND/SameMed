<?php
global $conn;
ConnectToDB();

	function ConnectToDB()
	{
		global $conn;
		define('DB_HOST','localhost'); 
		define('DB_NAME','webmedicine'); 
		define('DB_USER','root'); 
		define('DB_PASSWORD',''); 
		$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	}
	
	function GetAllMed()
	{
		//connection
		global $conn;
		
		//main
		$GetMedQuery = "SELECT MedName FROM chemmed GROUP BY MedName";
		$GetMedResult = mysqli_query($conn, $GetMedQuery);
		
		while($row = mysqli_fetch_assoc($GetMedResult))
			$AllMed[] = $row['MedName'];
		
		
		if(isset($AllMed))
			return $AllMed;
	}
?>
<html>
	<head>
		<title>Search Med</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	</head>
	<body>
		<div class="container">
			<div id="top">
				<h2>Web Mining project</h2>
				<h3>Check for same Medicines</h3>
				<?php
					if(isset($_GET['remark']) && $_GET['remark'] == "Error")
					{
					?>
						<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Danger!</strong> Some error occured.
						</div>
					<?php
					}
				?>
			</div>
			<div id="middle">
				<form action="FindSame.php" method="POST">
					<div class="form-group">
						<div style="width:200px;">
							<select name="MedName" class="form-control">
							<?php
								$AllMed = GetAllMed();
								$AllMedLen = count($AllMed);
								for($i=0;$i<$AllMedLen;$i++)
									echo "<option value='{$AllMed[$i]}'>{$AllMed[$i]}</option>";
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Search</button>
					</div>
				</form>
			</div>
		</div>	
	</body>
</html>