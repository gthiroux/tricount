<?php ob_start() ?>

<div class="arrow-title">
    <a href="home" class="arrow">
        <p>&#x2190;</p>
    </a>
    <h1> Vos Evènements</h1>
</div>

<button id="addSpent"> Créer une dépense</button>
<!-- Formulaire d'ajout de dépense -->
<div id="popupFormSpent" class="formCard modal">
    <!-- Contenu de la pop up -->
    <div class="modalContent">
        <div class="headerCard">
            <h2>Ajouter une dépense </h2>
            <span class="close">&times;</span>
        </div>
        <form method="POST" action="" name="addSpentForm" id="spentForm">
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
                <input id="totalSpent" name="totalSpent" type="text" placeholder="Entrez un montant"></input>
                <?php if (!empty($error["totalSpent"])): ?>
                    <span class="error"><?= htmlspecialchars($error["totalSpent"]) ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" name="addSpent" class="btn btn-primary">Ajouter la dépense</button>
        </form>
    </div>
</div>

<button id="addUser" class="secondary-btn"> Ajouter un participant</button>
<!-- Formulaire d'ajout d'un User -->
<div id="popupFormUser" class="formCard modal">
    <!-- Contenu de la pop up -->
    <div class="modalContent">
        <div class="headerCard">
            <h2>Ajouter un participant</h2>
            <span id= "closeUser" class="close">&times;</span>
        </div>
        <form method="POST" action="" name="addUserForm" id="userForm">
            <div class="formGroup">
                <label for="nameUser">Nom du participant : </label>
                <input
                    type="text"
                    id="nameUser"
                    name="nameUser"
                    placeholder="Entrez le nom du participant">
                <?php if (!empty($error["nameUser"])): ?>
                    <span class="error"><?= htmlspecialchars($error["nameUser"]) ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email du participant : </label>
                <input id="email" name="email" type="email" placeholder="Entrez l'email du participant"></input>
                <?php if (!empty($error["email"])): ?>
                    <span class="error"><?= htmlspecialchars($error["email"]) ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" name="addUser" class="btn btn-primary">Ajouter un participant</button>
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
                "admin" => $admin,
            ]); ?>

        <?php endforeach; ?>
    <?php endif; ?>
</div>
<form class="deleteModif" method="POST">
	<button name="deleteEvent"> Supprimer</button>
	<button id="modifEvent"> Modifier</button>
</form>
<!-- <script src="assets/js/formUser.js"></script> -->


<?php
render('default', true, [
    'title' => 'Events',
    'css' => 'global',
    'js' => 'formSpent',
    'content' => ob_get_clean(),
]);
?>