<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta http-equiv="Content-Language" content="fr-FR"/>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <base href="<?= env('base_url') ?>"/>
        <title><?= $title ?? env('app_name') ?></title>
        <meta name="description" content="<?= $description ?>"/>
        <style>
            *::before,
            *,
            *::after {
                box-sizing: border-box;
                margin: 0 auto;
                padding: 0;
                border: none;
                outline: none;
                color: inherit;
                text-decoration: none;
            }

            html, body {
                font: 1rem system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Droid Sans', 'Helvetica Neue', Arial, sans-serif;
            }

            #wrapper {
                width: 100%;
                height: 100%;
            }

            .layout {
                display: grid;
            }

            .box {
                display: flex;
            }

            .link {
                color: rgba(0, 127, 127, 0.75);
            }

            .link:hover,
            .link:active {
                color: rgba(0, 127, 127, 1);
                text-decoration: underline;
            }
            
            .entry,
            .button {
                border-radius: 4px;
                font-size: 1rem;
                padding: 10px 15px;
                display: block;
            }

            .entry {
                border: 1px solid rgba(0, 127, 127, 0.25);
                width: 100%;
            }

            .button {
                cursor: pointer;
                transition: 0.75s ease-in-out;
                border: 1px solid rgba(0, 127, 127, 0.5);
                background-color: rgba(0, 127, 127, 0.25);
            }

            .button:hover {
                color: #fff;
                border: 1px solid rgba(0, 127, 127, 1);
                background-color: rgba(0, 127, 127, 0.75);
            }

            .button:active {
                color: #000;
                border: 1px solid rgba(0, 127, 127, 0.75);
                background-color: rgba(0, 127, 127, 0.5);
            }

            .button:focus {
                color: #fff;
                background-color: rgba(0, 127, 127, 1);
            }

            .field-box {
                display: flex;
                margin: 10px auto;
            }

            .buttons-block {
                display: block;
                margin: 18px auto;
            }

            .buttons-block > .button {
                display: inline-block;
            }

            .form-container {
                max-width: clamp(50vw, 300px, 100%);
                margin: auto;
            }

            #wrapper > .layout {
                grid-template-columns: 1fr;
                grid-template-rows: 5rem calc(100vh - 8rem) 3rem;
                grid-template-areas: "head" "view" "foot";
                width: 100%;
                height: 100%;
            }

            #head,
            #view,
            #foot {
                display: flex;
                align-items: center;
                width: 100%;
                height: 100%;
            }

            #head {
                grid-area: head;
                color: rgb(255, 255, 255);
                background-color: rgb(0, 127, 127);
                padding: 10px 30px;
                justify-content: space-between;
            }

            #view {
                grid-area: view;
                background-color: rgb(240, 255, 255);
                justify-content: center;
                flex-direction: column;
                text-align: center;
                padding: 10px 15px;
            }

            #foot {
                grid-area: foot;
                color: rgba(0, 127, 127);
                border-top: 1px solid rgba(0, 127, 127, 0.125);
            }

            #view h1 {
                font-weight: normal;
                font-size: 2.5rem;
            }

            #view p {
                font-size: 1.3rem;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div class="layout">
                <header id="head">
                    <h1><a href="/"><?= env('app_name') ?></a></h1>
                </header>
                <main id="view"><?= $view ?></main>
                <footer id="foot">
                    <p><?= env('app_name') ?> &copy; 2021</p>
                </footer>
            </div>
        </div>
    </body>
</html>