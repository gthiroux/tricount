<h2 class="title">
    <?= htmlspecialchars($spent['name_spent']) ?>
</h2>
<p class="date">
    <?= filter_var($spent['date']) ?>
</p>
<h3 class="montant">
    Montant : <?= htmlspecialchars($spent['spent']) ?> €
</h3>
<p>
    Paye par <?= $nameAutor['name'] ?>
</p>
<h3 class="title">
    Participant
</h3>
<div class="participant">
    <div class="card-participant">
        <p><?= $nameAutor['name'] ?></p>
        <p>montant/nbrpersonne €</p>
    </div>
</div>