<?php ob_start() ?>

<h1><?php ?> Vos Evènements</h1>
<!-- <h2>formulaire d'ajout d'USER</h2>
<form action="" method='post' name="addUser">
    <input type="text" placeholder="Ajouter une nouvelle tâche" name="name" />
    <input type="text" placeholder="Ajouter une nouvelle tâche" name="spent" />

    <button id="newTaskValidate" type="submit">Valider</button>
</form> -->
<?php if (!empty($success)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<?php if (!empty($error["action"])): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error["action"]) ?></div>
<?php endif; ?>

<!-- Formulaire d'ajout -->
<div class="form-card">
    <h2>Ajouter une dépense </h2>
    <form method="POST" action="/" name="addSpent">
        <div class="form-group">
            <label for="nameSpent">Nom de la dépense : </label>
            <input
                type="text"
                id="nameSpent"
                name="nameSpent"
                value="<?= htmlspecialchars($_POST["nameSpent"] ?? "") ?>"
                placeholder="Entrez le titre de la tâche">
            <?php if (!empty($error["nameSpent"])): ?>
                <span class="error"><?= htmlspecialchars($error["nameSpent"]) ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="totalSpent">Montant </label>
            <input id="totalSpent" name="totalSpent" type="number" placeholder="Entrez un montant"><?= htmlspecialchars($_POST["totalSpent"] ?? "") ?></input>
            <?php if (!empty($error["totalSpent"])): ?>
                <span class="error"><?= htmlspecialchars(
                                        $error["totalSpent"],
                                    ) ?></span>
            <?php endif; ?>
        </div>

        <button type="submit" name="addSpent" class="btn btn-primary">Ajouter la dépense</button>
    </form>
</div>

<div id="spentList">
    <h2>Mes depenses</h2>
    <?php if (empty($spents)): ?>
        <p class="no-tasks">Aucune depense pour le moment. Ajoutez-en une !</p>
    <?php else: ?>
        <?php foreach ($spents as $spent): ?>
            <?php component("task-card", ["spent" => $spent]); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<button><a href="eventForm"> Create a new spent</a></button>
<?php
render('default', true, [
    'nameSpent' => 'Events',
    'css' => 'index',
    'js' => 'event',
    'content' => ob_get_clean(),
]);
?>