<div>
    <h1><?= fmt('Rejoignez %s', env('app_name')) ?></h1>
    <div>
        <p><a href="<?= lnk('users/LogIn') ?>" class="link"><?= fmt('Connectez-vous') ?></a> <?= fmt('ou') ?> <a href="<?= lnk('users/SignUp') ?>" class="link"><?= fmt('inscrivez-vous gratuitement') ?></a>.</p>
    </div>
    <div class="form-container">
        <form method="POST" action="#">
            <div class="field-box">
                <input type="text" name="user[login]" id="user_login" class="entry" placeholder="<?= fmt('Nom d\'utilisateur ou adresse e-mail') ?>"/>
            </div>
            <div class="field-box">
                <button type="submit" class="button" name="button" value="submit"><?= fmt('Demarrer') ?></button>
            </div>
        </form>
    </div>
</div>