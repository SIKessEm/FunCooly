<div>
    <h1>Rejoignez <?= env('app_name') ?></h1>
    <div>
        <p><a href="/users/LogIn" class="link">Connectez-vous</a> ou <a href="/users/SignUp" class="link">inscrivez-vous gratuitement</a>.</p>
    </div>
    <div class="form-container">
        <form method="POST" action="#">
            <div class="field-box">
                <input type="text" name="user[login]" id="user_login" class="entry" placeholder="Nom d'utilisateur ou adresse e-mail"/>
            </div>
            <div class="field-box">
                <button type="submit" class="button" name="button" value="submit">Demarrer</button>
            </div>
        </form>
    </div>
</div>