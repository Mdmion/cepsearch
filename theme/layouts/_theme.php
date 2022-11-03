<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema de busca CEP Simples desenvolvido com PHP e Jquery">
        <meta name="author" content="Marcelo Silva">
        <meta name="keywords" content="buscar cep, endereços, buscar endereço, Mdmion, projeto open source, php, css, html, jquery, web">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="shortcut icon" href="<?= url("assets/images/icons/cepsearch-icon.png") ?>"/>
        <link rel="canonical" href="<?= url() ?>"/>

        <title>
            <?php
            /** @var $title string
             * @var $company string *
             */
            echo ($this->e($title) ?? "") . " | " . ($this->e($company) ?? "");
            ?>
        </title>

        <link href="<?= url("assets/css/style.css") ?>" rel="stylesheet">
        <link href="<?= url("assets/css/fonts/inter.css") ?>" rel="stylesheet">
        <?=$this->section("css")?>
        <script src="<?= url("assets/js/style.js") ?>"></script>
        <script src="<?= url("assets/js/jquery-3.6.1.min.js") ?>"></script>
        <script src="<?= url("assets/js/typed.min.js")?>"></script>
        <script src="<?= url("assets/js/sweetalert2@11.js")?>"></script>
        <script src="<?= url("assets/js/sweetconfigure.js")?>"></script>
    </head>

    <body>
        <div class="wrapper">
            <?= $this->insert("/layouts/fragments/sidebar") ?>

            <div class="main">
                <?= $this->insert("/layouts/fragments/navbar") ?>
                <main class="content">
                    <div class="overlay"></div>
                    <?= $this->section("content") ?>
                </main>
                <?= $this->section("scripts") ?>

                <footer class="footer">
                    <?= $this->insert("/layouts/fragments/footer") ?>
                </footer>
            </div>
        </div>

    </body>
 </html>