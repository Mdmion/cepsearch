<?php
/** @var $title string
 *  @var $gmail string
 *  @var $linkedin string
 *  @var $git_status string
 * @var $git_commits string
 * @var $git_cobrinha string
**/
$this->layout("/layouts/_theme", ["title" => $title]);

$this->push("css");
?>
<link href="<?= url("assets/css/pages/author.css") ?>" rel="stylesheet">
<?php
$this->end();
?>

<div class="container-fluid p-0">
    <div class="row col-lg-12 d-flex justify-content-center">
        <div>
            <img alt="Logo-Github" class="logo-git" src="<?= url("assets/images/icons/git.png") ?>">
        </div>
        <div class="row col-md-10 d-flex justify-content-center">
            <div class="mb-3 text-center">
                <h2 class="fw-bold text-white"> Olá eu sou o Marcelo, Programador FullStack PHP</h2>
                <h4 class="fst-italic fw-bold text-orange">Seja bem vindo ao projeto CEP Search!</h4>
                <p class="text-white fw-bold">Em 2020 dei início aos estudos na área da programação com foco em Front-end. Em 2021 comecei a me especializar em Back-end. Desde então venho estudando novas linguagens e técnicas de desenvolvimento e arquitetura de softwares voltados para web, tendo como objetivo entregar soluções utilizando o melhor que a tecnologia pode proporcionar através da experiência que adquiri atuando em startups de vários segmentos.</p>
            </div>
            <div class="row d-flex justify-content-center">
                    <img class="svg-git1" src="<?=$git_status?>"/>
                    <img class="svg-git2" src="<?=$git_commits?>"/>
            </div>
        </div>
        <div class="row col-md-10 d-flex">
             <div class="d-flex bd-highlight mb-3">
                 <div class="me-auto p-2 bd-highlight">
                    <h4 class="fw-bold text-white fst-italic mb-3">Minha Stack</h4>
                    <img alt="Mdmion-C" class="ico-stack" src="<?= url("assets/images/icons/stack/c.svg") ?>">
                    <img alt="Mdmion-PHP" class="ico-stack" src="<?= url("assets/images/icons/stack/php.svg") ?>">
                    <img alt="Mdmion-Laravel" class="ico-stack" src="<?= url("assets/images/icons/stack/laravel.svg") ?>">
                    <img alt="Mdmion-HTML" class="ico-stack" src="<?= url("assets/images/icons/stack/html5.svg") ?>">
                    <img alt="Mdmion-Bootstrap" class="ico-stack" src="<?= url("assets/images/icons/stack/bootstrap.svg") ?>">
                    <img alt="Mdmion-CSS" class="ico-stack" src="<?= url("assets/images/icons/stack/css3.svg") ?>">
                    <img alt="Mdmion-TailwindCSS" class="ico-stack" src="<?= url("assets/images/icons/stack/tailwindcss.svg") ?>">
                    <img alt="Mdmion-JS" class="ico-stack" src="<?= url("assets/images/icons/stack/javascript.svg") ?>">
                    <img alt="Mdmion-JS" class="ico-stack" src="<?= url("assets/images/icons/stack/jquery.svg") ?>">
                    <img alt="Mdmion-VueJS" class="ico-stack" src="<?= url("assets/images/icons/stack/vuejs.svg") ?>">
                </div>
                <div class="p-2 bd-highlight">
                    <img class="mdmion-pic" alt="Mdmion-pic" src="<?= url("assets/images/avatars/author/avatar.png") ?>">
                </div>
            </div>
            <div class="mb-3">
                <h4 class="fw-bold fst-italic text-white mb-3">Meios de Contato</h4>
                <a href="mailto:<?= $gmail ?>"><img src="<?= url("assets/images/icons/socials/gmail.svg") ?>" target="_blank"></a>
                <a href="<?= $linkedin ?>" target="_blank"><img src="<?= url("assets/images/icons/socials/linkedin.svg") ?>" target="_blank"></a>
            </div>
            <div class="mb-3 d-flex justify-content-center table-responsive">
                <img alt="Mdmion-Commits" src="<?=$git_cobrinha?>">
            </div>
        </div>
    </div>
    
</div>
