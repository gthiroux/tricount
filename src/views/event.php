<?php ob_start() ?>

<h1><?php  ?> Vos Evènements</h1>

<button id="addSpent"> Create a new spent</button>
<!-- Formulaire d'ajout -->
<div id="popupFormSpent" class="formCard modal">
    <!-- Contenu de la pop up -->
    <div class="modalContent">
        <div class="headerCard">
            <h2>Ajouter une dépense </h2>
            <span class="close">&times;</span>
        </div>
        <form method="POST" action="" name="addSpentForm" id="monFormulaire">
            <div class="formGroup">
                <label for="nameSpent">Nom de la dépense : </label>
                <input
                    type="text"
                    id="nameSpent"
                    name="nameSpent"
                    placeholder="Entrez le titre de la dépense">
                <?php if (!empty($error["nameSpent"])): ?>
                    <span class="error"><?= htmlspecialchars($error["nameSpent"]) ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="totalSpent">Montant </label>
                <input id="totalSpent" name="totalSpent" type="number" placeholder="Entrez un montant"></input>
                <?php if (!empty($error["totalSpent"])): ?>
                    <span class="error"><?= htmlspecialchars($error["totalSpent"]) ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" name="addSpent" class="btn btn-primary">Ajouter la dépense</button>
        </form>
    </div>
</div>

<div id="spentList">
    <h2 class="title">Mes depenses</h2>
    <?php if (empty($spents)): ?>
        <p class="no-spents">Aucune dépense pour le moment.Ajoutez-en une!</p>
    <?php else: ?>
        <?php foreach ($spents as $spent): ?>
            <?php component("spent-card", [
                "spent" => $spent,
                "nameAutor" => $nameAutor,
            ]); ?>

        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php
render('default', true, [
    'title' => 'Events',
    'css' => 'global',
    'js' => 'formSpent',
    'content' => ob_get_clean(),
]);
?>