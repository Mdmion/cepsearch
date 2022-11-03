<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item">

                <a class="nav-link" target="_blank" href="<?= PersonDATA["linkedin"] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="LinkedIn">
                  <img class="ico-socials" src="<?= url("assets/images/icons/socials/linkedin.png") ?>">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="<?= PersonDATA["github"] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Github">
                  <img class="ico-socials" src="<?= url("assets/images/icons/socials/github.png") ?>">
                </a>
            </li>
           <li class="nav-item">
                <a class="nav-link" target="_blank" href="mailto:<?= PersonDATA["gmail"] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Gmail">
                  <img class="ico-socials" src="<?= url("assets/images/icons/socials/gmail.png") ?>">
                </a>
            </li>
        </ul>
    </div>
</nav>