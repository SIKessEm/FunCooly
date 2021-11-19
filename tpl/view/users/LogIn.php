<div>
    <h1><?= fmt('Connectez-vous') ?></h1>
    <div class="form-container">
        <form method="POST" action="#">
            <div class="field-box">
                <input type="text" name="user[name]" id="user_name" class="entry" placeholder="<?= fmt('Nom d\'utilisateur') ?>"/>
            </div>
            <div class="field-box">
                <input type="password" name="user[password]" id="user_password" class="entry" placeholder="<?= fmt('Mot de passe') ?>"/>
            </div>
            <div class="field-box">
                <button type="submit" class="button" name="button" value="submit"><?= fmt('Me connecter') ?></button>
            </div>
        </form>
    </div>
    <div>
        <p><?= fmt('Je ne suis pas encore membre.') ?> <a href="<?= lnk('users/SignUp') ?>" class="link"><?= fmt('Je veux m\'inscrire gratuitement !') ?></a></p>
    </div>
</div>