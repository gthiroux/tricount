<a href="spent?id=<?= $spent['id'] ?>">
    <div class="spent-card" <?= $spent["status"] === "done" ? "spent-done" : "" ?>>
        <div class="spent-content">
            <h3 class="spent">
                <?= htmlspecialchars($spent['name_spent']) ?>
            </h3>
            <p>Payé par <?= $admin['name'] ?></p>
            <p class="spent"> <?= htmlspecialchars($spent['spent']) ?> €</p>

        </div>
    </div>
</a>