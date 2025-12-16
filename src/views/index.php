<?php ob_start() ?>

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
<?php
render('default', true, [
	'title' => 'Acceuil',
	'css' => 'index',
	// 'js' => 'event',
	'content' => ob_get_clean(),
]);
?>