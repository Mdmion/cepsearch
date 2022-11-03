<?php
/** @var $title string *
 * @var $router \CoffeeCode\Router\Router
 * @var $fetchstate \CoffeeCode\Router\Router
 */
$this->layout("/layouts/_theme", ["title" => $title]);
?>

<div class="container-fluid p-0">
    <div class="row col-lg-12 d-flex justify-content-center">
        <div class="row col-md-7 d-flex justify-content-center">
            <form id="searchcep" method="POST" action="<?= $router->route("Search.fetchcep") ?>">
                <div class=" col-md-12 mb-3">
                    <label for="searchtype" class="form-label text-orange">Selecione o tipo de pesquisa:</label>
                    <select class="form-select form-select-xl" name="searchtype" id="searchtype">
                        <option selected disabled>Escolha...</option>
                        <option value="1">Pesquisar pelo CEP</option>
                        <option value="2">Pesquisar pelo Endereço</option>
                    </select>
                </div>
                <div  id="showaddress">
                    <div class="row mb-3">
                        <div class="mb-1 col-md-10">
                            <input type="search" class="form-control form-control-xl" name="cidade" id="cidade" placeholder="" autocomplete="off" list="cidades">
                            <datalist id="cidades">
                                <?php
                                if(isset($cidades)):
                                    foreach ($cidades as $cidade):
                                    ?>
                                    <option data-value="<?=$cidade->id_estado?>"><?= $cidade->nome ?></option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </datalist>
                        </div>
                        <div class="mb-1 col-md-2">
                            <input type="text" class="form-control form-control-xl" name="estado" id="estado" placeholder="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-xl" name="cep" id="cep" placeholder="Pesquisar" autocomplete="off">
                        <button id="btnsubmit" type="submit" class="btn btn-lg btn-search btn-orange">&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card row col-lg-12 d-flex justify-content-center mt-3">
        <div class="mb-1">
            <iframe class="loadmap mt-3" src=""></iframe>
        </div>
            <div class="mb-1 d-flex justify-content-center ">
                <textarea id="cepresponse" rows="3" class="form-control bg-main" disabled></textarea>
            </div>
            <div class="mb-1 d-flex justify-content-end">
                <div class="m-1">
                    <button id="btncopia" class="btn btn-blue" disabled>Copiar  <i class="align-middle fw-bold" data-feather="clipboard"></i></button>
                </div>
                <div class="dropdown m-1">
                    <button id="btnexport" class="btn btn-orange dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                        Exportar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<!--                        <li><a class="dropdown-item text-success fw-bold" href="#" disabled="on"><i class="align-middle fw-bold" data-feather="file-plus"></i> Exportar Excel</a></li>-->
                        <li>
                            <form id="txtcreate" method="POST" action="<?=$router->route("Controller.txtcreate")?>">
                                <input type="hidden" name="txtresponse" id="txtresponse"/>
                                <a class="dropdown-item fw-bold" href="javascript:$('#txtcreate').submit()"><i class="align-middle fw-bold" data-feather="file-text"></i> Exportar Texto</a>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="dropdown m-1">
                    <button  class="btn btn-danger" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Configurações"><i class="align-middle fw-bold" data-feather="settings"></i></button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
<!--                        <li><a class="dropdown-item text-success fw-bold" href="#" disabled="on"><i class="align-middle fw-bold" data-feather="file-plus"></i> Exportar Excel</a></li>-->
                        <li>
                            <a id="btnclear" class="disabled dropdown-item fw-bold text-danger" ><i class="align-middle fw-bold" data-feather="trash-2"></i> Limpar pesquisa</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
</div>

<?= $this->push("scripts") ?>
    <script type="text/javascript">
        let fetchstate = "<?=$fetchstate?>";
    </script>
    <script type="text/javascript" src="<?= url("assets/js/app/index/functions.js") ?>"></script>
    <script type="text/javascript" src="<?= url("assets/js/app/index/searchcep.js") ?>"></script>
<?= $this->end() ?>