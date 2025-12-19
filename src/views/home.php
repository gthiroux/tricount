<?php ob_start(); ?>

<h1>Events</h1>
<button id="addEvent"> Créer un nouveau évènement</button>
<!-- Formulaire d'ajout -->
<div id="popupFormEvent" class="formCard modal">
	<!-- Contenu de la pop up -->
	<div class="modalContent">
		<div class="headerCard">
			<h2>Ajouter un évènement </h2>
			<span class="close">&times;</span>
		</div>
		<form method="POST" action="" name="addEventForm">
			<div class="formGroup">
				<label for="nameEvent">Nom de l'évènement : </label>
				<input
					type="text"
					id="nameEvent"
					name="nameEvent"
					placeholder="Entrez le titre de l'évènement">
				<?php if (!empty($error["nameEvent"])): ?>
					<span class="error"><?= htmlspecialchars($error["nameEvent"]) ?></span>
				<?php endif; ?>
			</div>

			<div class="formGroup">
				<label for="nameEvent">Participant : </label>
				<input
					type="text"
					id="emailUser"
					name="emailUser"
					placeholder="Entrez l'email ">
				<?php if (!empty($error["emailUser"])): ?>
					<span class="error"><?= htmlspecialchars($error["emailUser"]) ?></span>
				<?php endif; ?>
			</div>

			<button type="submit" name="addEvent" class="btn btn-primary">Ajouter l'évènement</button>
		</form>
	</div>
</div>

<div id="eventList">
	<h2 class="title">
		Mes Evènements
	</h2>
	<?php if (empty($events)): ?>
		<p class="no-events">Aucune depense pour le moment. Ajoutez-en une !</p>
	<?php else: ?>
		<?php foreach ($events as $event): ?>
			<?php component("event-card", [
				"event" => $event
			]); ?>

		<?php endforeach; ?>
	<?php endif; ?>
</div>

<?php
render('default', true, [
	'title' => 'Acceuil',
	'css' => 'global',
	'js' => 'formEvent',
	'content' => ob_get_clean(),
]);
?>