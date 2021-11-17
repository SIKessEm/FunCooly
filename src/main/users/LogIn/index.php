<?php
return render('layout.main', [
    'title' => env('app_name') . ' : Connexion',
    'description' => 'Accédez à votre compte ' . env('app_name') . ' pour discuter avec vos correspondant',
    'view' => render('view.users.LogIn')
]);