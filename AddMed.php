<?php
if(isset($_POST['ChemName']))
{
	ConnectToDB();
	AddMedicine();
}
function ConnectToDB()
{
	global $conn;
	define('DB_HOST','localhost'); 
	define('DB_NAME','webmedicine'); 
	define('DB_USER','root'); 
	define('DB_PASSWORD',''); 
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
}
function AddMedicine()
{
	//connection
	global $conn;
	
	//post data
	$MedName = $_POST['MedName'];
	$ChemName = $_POST['ChemName'];
	$ChemPrio = $_POST['ChemPrio'];
	
	for($i=0; $i<4; $i++)
	{
		if(!empty($MedName[$i]) && !empty($ChemName[$i]) && !empty($ChemPrio[$i]))
		{
			if($i == 0)
				$MainQuery = "INSERT INTO `chemmed`(`MedName`, `ChemName`, `Priority`) VALUES ('$MedName[$i]', '$ChemName[$i]', '$ChemPrio[$i]')";
			else
			{
				$SubQuery = ", ('$MedName[$i]', '$ChemName[$i]', '$ChemPrio[$i]')";
				$MainQuery = $MainQuery.$SubQuery;
			}
		}
	}
	
	$AddMedResult = mysqli_query($conn, $MainQuery);
	var_dump($MainQuery);
	if($AddMedResult)
		header("location:AddMed.php");
	//else
	//	header("location:?remark=Error");
}
?>
<html>
	<head>
		<title>Add New Medicine</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	</head>
	<body>
		<div class="container">
			<div id="top">
				<h2>Web Mining project</h2>
				<h3>Add New Medicines</h3>
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
				<form style="width:800px;" method="POST" class="alert alert-success">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<h4>Medicine Name</h4>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<h4>Chemical Name</h4>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<h4>Chemical priority in medicine</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="MedName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemPrio[]">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="MedName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemPrio[]">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="MedName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemPrio[]">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="MedName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemName[]">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input class="form-control" type="text" name="ChemPrio[]">
							</div>
						</div>
					</div>
					<div>
						<button class="btn btn-primary">Add Chemical</button>
					</div>
				</form>
			</div>			
		</div>
	</body>
</html>