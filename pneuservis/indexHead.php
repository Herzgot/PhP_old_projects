<?php
session_start();
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';
?>
<!DOCTYPE html>
<html lang="sk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="css/custom.css" rel="stylesheet">
		<title>Pneuservis</title>
	</head>
	<body>
	<?php
$login = isset($_POST['login']) ? checkDBInput($_POST['login']) : false;
$heslo = isset($_POST['heslo']) ? md5($_POST['heslo']) : false;

// Kontrola 
$showPrihlasenie = '';
if($login && $heslo)
{
	//unset($_SESSION['Cislo_citatela']);
	$sql = "SELECT Cislo_citatela FROM citatel WHERE Heslo = '$heslo' AND Login = '$login'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if(isset($row['Cislo_citatela']) && $row['Cislo_citatela'])
	{
		$_SESSION['Cislo_citatela'] = $row['Cislo_citatela'];
		$showPrihlasenie = showBox('Ste prihlásený do systému', 'success');
	}
	else
	{
		$showPrihlasenie = showBox('Prihlásenie sa nepodarilo', 'danger');
	}
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Pneuservis</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Pneuservis</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Pneumatiky</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="index.php">Motopneu</a>
				</li>					
				<li class="nav-item">
					<a class="nav-link" href="index.php">Disky</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Príslušenstvo</a>
				</li>				
				<li class="nav-item">
					<a class="nav-link" href="index.php">Autoservis</a>
				</li>			
			</ul>
            <ul class="nav navbar-nav navbar-right">
			    <?php
			    if(isset($_SESSION['Cislo_citatela']) && $_SESSION['Cislo_citatela'])
			    {
				    echo '<li><a href="#">' . menoUser($_SESSION['Cislo_citatela']) . '</a</li> ';	
				    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Odhlásenie</a></li>';
			    }
			    else
				    echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Prihlásenie</a></li>';
			    ?>
		    </ul>
		</div>
	</div>
</nav>

<div class="container">
<?php
echo $showPrihlasenie;