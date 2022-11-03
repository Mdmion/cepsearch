<?php
/**@var $router \CoffeeCode\Router\Router*
 *@var $page string
 */
?>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center" href="<?= url() ?>">
            <img class="logo-sidebar" src="<?= url("assets/images/logo/logo.png") ?>" alt="CEP Search">
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Opções de pesquisa
            </li>
            <li class="sidebar-item  <?= $page === "home" ? "active" : ""?>">
                <a class="sidebar-link" href="<?= $router->route("Home.index") ?>">
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pesquisar por CEP</span>
                </a>
            </li>
            <li class="sidebar-header">
                Sobre o Autor
            </li>
            <li class="sidebar-item <?= $page === "author" ? "active" : ""?>">
                <a class="sidebar-link" href="<?= $router->route("Author.index") ?>">
                  <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Perfil</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Me acompanhe</strong>
                <div class="mb-3 text-sm">
                    Quer ficar por dentro de novos commits irados? Me siga no GitHub.
                </div>
                <div class="d-grid">
                    <a target="_blank" href="<?= PersonDATA["github"] ?>" class="btn btn-blue"> <i class="align-middle fw-bold" data-feather="github"></i> Seguir Perfil</a>
                </div>
            </div>
        </div>
    </div>
</nav>