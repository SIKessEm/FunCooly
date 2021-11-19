<div>
    <h1><?= fmt('Inscrivez-vous gratuitement') ?></h1>
    <div class="form-container">
        <form method="POST" action="#">
            <div class="field-box">
                <input type="text" name="user[name]" id="user_name" class="entry" placeholder="<?= fmt('Nom d\'utilisateur') ?>"/>
            </div>
            <div class="field-box">
                <input type="email" name="user[email]" id="user_email" class="entry" placeholder="<?= fmt('Adresse e-mail') ?>"/>
            </div>
            <div class="field-box">
                <input type="password" name="user[password]" id="user_password" class="entry" placeholder="<?= fmt('Mot de passe') ?>"/>
            </div>
            <div class="field-box">
                <button type="submit" class="button" name="button" value="submit"><?= fmt('M\'inscrire') ?></button>
            </div>
        </form>
    </div>
    <div>
        <p><?= fmt('Je suis déjà membre.') ?> <a href="/users/LogIn" class="link"><?= fmt('Je veux me connecter !') ?></a></p>
    </div>
</div>