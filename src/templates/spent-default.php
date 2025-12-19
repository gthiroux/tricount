<div class="arrow-title">
    <a href="event?id=<?= $spent['id_event'] ?>" class="arrow">
        <p>&#x2190;</p>
    </a>
    <h2 class="title title-spent">
        <?= htmlspecialchars($spent['name_spent']) ?>
    </h2>
</div>
<p class="date">
    <?= formatDate($spent['date'], "d/m/Y") ?>
</p>
<h3 class="montant">
    Montant : <?= htmlspecialchars($spent['spent']) ?> €
</h3>
<p>
    Payé par <?= $admin['name'] ?>
</p>
<h3 class="title">
    Participant
</h3>
<div class="participant">
    <div class="card-participant">
        <p><?= htmlspecialchars($admin['name']) ?></p>
        <p><?= htmlspecialchars($montantParPersonne) ?></p>
    </div>
</div>
<?php for ($i = 1; $i < count($usersList); $i++): ?>
    <div class="participant">
        <div class="card-participant">
            <p><?= htmlspecialchars($usersList[$i]->getUsername()) ?></p>
            <p><?= htmlspecialchars($montantParPersonne) ?></p>
        </div>
    </div>
<?php endfor; ?>