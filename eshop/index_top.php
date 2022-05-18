<?php
session_start();
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';
?>
<!doctype html>
<html lang="sk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Projekt</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> 

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>
<body>

<?php
$login = isset($_POST['login']) ? checkDBInput($_POST['login']) : false;
$heslo = isset($_POST['heslo']) ? md5($_POST['heslo']) : false;
// Kontrola 
$showPrihlasenie = '';
if($login && $heslo)
{
	$sql = "SELECT cislo_zakaznika FROM zakaznik WHERE heslo = '$heslo' AND login = '$login' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($row['cislo_zakaznika']) && $row['cislo_zakaznika'])
	{
		$_SESSION['cislo_zakaznika'] = $row['cislo_zakaznika'];
		$showPrihlasenie = showBox('Ste prihlásený do systému', 'success');
	}
	else
	{
		$showPrihlasenie = showBox('Prihlásenie sa nepodarilo', 'danger');
	}
}
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Eshop</a>
      </li>
<?php
if(isset($_SESSION['cislo_zakaznika']) && $_SESSION['cislo_zakaznika'])	
{		
	$idUser = intval($_SESSION['cislo_zakaznika']);
	$sql = "SELECT rola FROM zakaznik WHERE cislo_zakaznika = '$idUser'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		if($row['rola'] == 'admin')
		{
			// ak je admin - zobraz menu administracia
?>			
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administrácia</a>
				<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
        <li><a class="dropdown-item" href="tovar.php">Tovar</a></li>
        <li><a class="dropdown-item" href="objednavky.php">Objednávky</a></li>
        <li><a class="dropdown-item" href="users.php">Zákazníci</a></li>
				</ul>
			</li>
<?php
		}
		
	}

}
?>
		<li class="nav-item">
        <a class="nav-link" href="obchod.php">Obchod</a>
      	</li>
<?php
if(isset($_SESSION['cislo_zakaznika']) && $_SESSION['cislo_zakaznika'])	
{		
	$idUser = intval($_SESSION['cislo_zakaznika']);
	$sql = "SELECT rola FROM zakaznik WHERE cislo_zakaznika = '$idUser'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		if($row['rola'] == 'user')
		{
?>
		<li class="nav-item">
        <a class="nav-link" href="moje_objednavky.php">Moje objednávky</a>
      	</li>
<?php
		}
		
	}

}
?>
    </ul>
<?php
if(isset($_SESSION['cislo_zakaznika']) && $_SESSION['cislo_zakaznika'])	
{	
echo '<form class="d-flex">
        <a style="margin-right:16px" href="kosik.php" class="btn btn-primary">Nákupný košík</a>';
}
?>          

<?php
if(isset($_SESSION['cislo_zakaznika']) && $_SESSION['cislo_zakaznika'])	
{		
	$idUser = intval($_SESSION['cislo_zakaznika']);
	$sql = "SELECT meno, priezvisko FROM zakaznik WHERE cislo_zakaznika = '$idUser'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) 
	{
		$res = mysqli_fetch_assoc($result);
		echo '<button style="margin-right:16px" type="button" class="btn btn-dark">' . $res['meno'] . ' ' . $res['priezvisko'] . '</button>';
	}
	echo '<a href="logout.php" class="btn btn-primary">Odhlásenie</a>';
}
else
{		
	echo '<a href="login.php" class="btn btn-primary">Prihlásenie</a>';
}
?>
      </form>
	</div>
</nav>

<div class="container">
<?php
echo $showPrihlasenie;