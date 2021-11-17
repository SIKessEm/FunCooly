<?php
return render('layout.main', [
    'title' => env('app_name') . ' : Rejoindre',
    'description' => 'Découvrez les membres actifs de ' . env('app_name') . ' pour partager avec eux',
    'view' => render('view.users.index')
]);