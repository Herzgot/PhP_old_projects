<?php
include "inc/functions.php";
?>
<!DOCTYPE html>
<html lang="sk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="css/custom.css" rel="stylesheet">
		<title>PWA</title>
	</head>
	<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">PWA</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="array.php">Polia</a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" href="arrays.php">Práca s poľom</a>
				</li>					
				<li class="nav-item">
					<a class="nav-link" href="form.php">Formuláre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="import.php">Importy</a>
				</li>				
				<li class="nav-item">
					<a class="nav-link" href="string.php">Spracovanie textu</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Banka
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="exchange_rate.php">Kurzový lístok</a></li>
						<li><a class="dropdown-item" href="calculator.php">Kalkulátor</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="minicalculator.php">Kalkulačka</a>
				</li>				
			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>

<div class="container">