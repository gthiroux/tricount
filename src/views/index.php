<?php ob_start();

session_start(); 

?>

<h1>Event</h1>
<form action="" method='post'>
	<input type="text" placeholder="Ajouter une nouvelle tâche" name="name" />

	<button id="newEvent" type="submit">Valider</button>
</form>

<div id="eventList">
	<a href="event">
		<div class="event">
			<div>
				<img src="" alt="image">
				<p>Name</p>
			</div>
			<div> picto</div>
		</div>
	</a>
</div>

<button> <a href="#">Create a new event</a></button>
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
	'css' => 'index',
	// 'js' => 'event',
	'content' => ob_get_clean(),
]);
?>