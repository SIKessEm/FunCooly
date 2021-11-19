<?php
return render('layout.main', [
    'title' => fmt('%s : Inscription', env('app_name')),
    'description' => fmt('Créez votre compte %s gratuitement et discutez avec des personnes partout dans le monde', env('app_name')),
    'view' => render('view.users.SignUp')
]);