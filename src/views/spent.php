<?php ob_start() ?>
<?php if (empty($spents)): ?>
	<p class="no-events">Aucune depense pour le moment. Ajoutez-en une !</p>
<?php else: ?>
	<?php foreach ($spents as $spent): ?>
		<?php component("spent-default", [
			"spent" => $spent,
			"admin" => $admin,
			'montantParPersonne' => $montantParPersonne,
			'usersList' => $usersList,
		]); ?>

	<?php endforeach; ?>
<?php endif; ?>
<form class="deleteModif" method="POST">
	<button name="deleteSpent"> Supprimer</button>
	<button id="modifSpent"> Modifier</button>
</form>


<?php
render('default', true, [
	'title' => 'Spent',
	'css' => 'global',
	// 'js' => 'event',
	'content' => ob_get_clean(),
]);
?>