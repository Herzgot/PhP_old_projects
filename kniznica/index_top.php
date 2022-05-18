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

	<title>Knižnica</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
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

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Knižnica</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrácia
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="authors.php">Autori</a></li>
					<li><a href="users.php">Čitatelia</a></li>
					<li><a href="genres.php">Žánre</a></li>
					<li><a href="books.php">Knihy</a></li>
					<li><a href="printouts.php">Exempláre</a></li>
				</ul>
			</li>
			<li><a href="loans.php">Výpožičky</a></li>
			<li><a href="list_books.php">Zoznam kníh</a></li>
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
</nav>

<div class="container">
<?php
echo $showPrihlasenie;