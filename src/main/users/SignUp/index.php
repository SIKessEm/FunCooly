<?php
return render('layout.main', [
    'title' => env('app_name') . ' : Inscription',
    'description' => 'Créez votre compte ' . env('app_name') . ' gratuitement et discutez avec des personnes partout dans le monde',
    'view' => render('view.users.SignUp')
]);