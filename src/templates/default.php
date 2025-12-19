<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<?php if (!empty($css)) { ?>
		<link rel="stylesheet" href="assets/css/<?= $css ?>.css">
	<?php } ?>
	<title>CoinCoin<?= isset($title) ? ' - ' . $title : '' ?></title>
</head>

<body>
	<nav class="navbar">
		<div class="nav-logo">
			<a href="/home">
				<h1>CoinCoin</h1>
			</a>
		</div>
		<div class="nav-profile">
			<!-- ajout d'une page profil à venir -->
			<a href="#" id="profileIcon" class="profile-link">
				<span class="profile-icon">&#x1F464;</span>
			</a>
		</div>
	</nav>
	<main>
		<?= $content ?>
	</main>
	<script src="assets/js/<?= $js ?>.js"></script>
</body>

</html>