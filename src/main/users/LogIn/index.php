<?php
return render('layout.main', [
    'title' => fmt('%s : Connexion', env('app_name')),
    'description' => fmt('Accédez à votre compte %s pour discuter avec vos correspondant', env('app_name')),
    'view' => render('view.users.LogIn'),
]);