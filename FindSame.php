<?php
global $conn;
ConnectToDB();
FindSame();
	function ConnectToDB()
	{
		global $conn;
		define('DB_HOST','localhost'); 
		define('DB_NAME','webmedicine'); 
		define('DB_USER','root'); 
		define('DB_PASSWORD',''); 
		$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
	}
	function FindSame()
	{
		global $conn;
		$MedName = trim($_POST['MedName']);
		$AllPriorityQuery = "SELECT ChemName FROM chemmed WHERE MedName = '$MedName' ORDER BY Priority ASC";
		$AllPriorityResult = mysqli_query($conn, $AllPriorityQuery);
		while($row = mysqli_fetch_row($AllPriorityResult))
			$AllPriority[] = $row;

		$CountPri = count($AllPriority);
		
		for($j = 0; $j<$CountPri; $j++)
		{
			for($i = 0; $i<$CountPri-$j; $i++)
			{
				
				$NowPri = $AllPriority[$i][0];
				
				if($i==0)
					$BaseQuery = "SELECT MedName FROM chemmed WHERE ChemName = '$NowPri' ";
				else
				{
					$AddQuery = "AND MedName IN ( SELECT MedName FROM chemmed WHERE ChemName = '$NowPri' ";
					$BaseQuery = $BaseQuery.$AddQuery;
				}
			}
			
			for($i = 0; $i<$CountPri-$j-1; $i++)
				$BaseQuery = $BaseQuery.")";
			
			$NowStageQuery = mysqli_query($conn, $BaseQuery);
			
			$WhichCluster = $j+1;
			
			while($row = mysqli_fetch_assoc($NowStageQuery))
				$MainResult[$j][] = $row['MedName'];	
 		}

		return $MainResult;
	}	
?>	
<!DOCTYPE HTML>
<html>
	<head>
		<title>Medicine Find</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	</head>
	<body>
		<div class="container">
			<div>
				<h1>Web Mining Project</h1>
			</div>
			<?php
				$Result = FindSame();
				for($i = 0; $i<count($Result); $i++)
				{
					echo "<div class='alert alert-success'>";
					$WhichCluster = $i + 1;
					echo "<h3>{$WhichCluster} cluster containes this medicine</h3>";
					echo "<ul>";
					for($j = 0; $j<count($Result[$i]); $j++)
					{
						echo "<li><h4>{$Result[$i][$j]}</h4></li>";
					}
					echo "</ul></div>";
				}
			?>
		</div>
	</body>
</html>