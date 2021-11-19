<div>
    <h1><?= fmt('Discutez et partagez librement sur %s', env('app_name')) ?></h1>
    <p><?= fmt('%s est un espace de discussion en ligne qui se veut simple, sûre et sécurisé.', env('app_name')) ?></p>
</div>
<div>
    <p class="buttons-block"><a href="<?= lnk('users/LogIn') ?>" class="button"><?= fmt('Se connecter') ?></a> <a href="<?= lnk('users/SignUp') ?>" class="button"><?= fmt('S\'inscrire gratuitement') ?></a></p>
</div>