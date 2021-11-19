<?php
return render('layout.main', [
    'title' => fmt('%s : Rejoindre', env('app_name')),
    'description' => fmt('Découvrez les membres actifs de %s pour partager avec eux', env('app_name')),
    'view' => render('view.users.index')
]);