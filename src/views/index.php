<?php ob_start(); ?>

<div class="register-container">
    <div class="register-card">
        <h1>Connexion à votre compte</h1>
        <p class="subtitle">Bienvenue ! Créez votre compte pour commencer.</p>

        <form method="POST" action="" name="registerForm">
            <div class="formGroup">
                <label for="name">Nom d'utilisateur</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Entrez votre nom"
                    required>
                <?php if (!empty($error["name"])): ?>
                    <span class="error"><?= htmlspecialchars($error["name"]) ?></span>
                <?php endif; ?>
            </div>

            <div class="formGroup">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="votre@email.com"
                    required>
                <?php if (!empty($error["email"])): ?>
                    <span class="error"><?= htmlspecialchars($error["email"]) ?></span>
                <?php endif; ?>
            </div>

            <?php if (!empty($error["global"])): ?>
                <div class="error global-error">
                    <?= htmlspecialchars($error["global"]) ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="register" class="btn btn-primary btn-full">
                Créer mon compte
            </button>
        </form>
    </div>
</div>
<?php
render('default', true, [
    'title' => 'Connexion',
    'css' => 'global',
    'content' => ob_get_clean(),
]);
?>