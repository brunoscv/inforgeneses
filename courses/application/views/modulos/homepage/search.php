<style>
    .googlemap {
        height: 700px;     
    }
    #map {
        height:550px;
        width: 100%;
    }
</style>
<section class="bg-white">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 bg-white py-0 px-0">
                <div id="map"></div>
            </div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= "AIzaSyCTzg9Ctkd3uGsCEgc_gMpA7m-DaUMuZHs"; ?>&callback=init"></script>
        </div>
    </div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-12">
                <form id="form_imoveis" action="<?php echo site_url('homepage/search/') . $destino . '/'; ?>" method="get" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="input-group">
                                <style>#inpSearchQuery:focus { border-color: #dee2e6; color: inherit;}</style>
                                <input id="inpSearchQuery" type="text" class="form-control border-right-0 rounded-left" placeholder="Endereço, bairro, cidade ou CEP" name="searchquery" value="<?= @$search;?>" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary border-left-0 shadow-none bg-white" name="buscar" value="Buscar" style="border-color:#dee2e6;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>      
            </div>
        </div> 
        <div class="row mt-3">
            <div class="col-12 bg-white text-center">
                <div class="row mb-1">
                    <div class="col-12">
                        <!-- <h2 style="color: #000"><?= $search; ?></h2> -->
                        <span><?= $quantidade; ?> resultado(s)</span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php foreach ($listaImoveis as $item) { ?>
                        <?php if($item->status_id == 1) { ?>
                            <div class="col-10 col-sm-6 col-md-4 col-lg-3">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <a href="<?= site_url("perfilimoveis/index/").$item->id;?>">
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <img style="height: 10em"class="img-fluid rounded-top w-100" alt="img-capa" src="<?php if(isset($item->caminho)) { echo "https://seucantoimoveis.com.br/seucanto/admin/{$item->caminho}/{$item->descricao}" ; } else { echo 'https://seucantoimoveis.com.br/seucanto/site/assets/img/theme/default-image.png';} ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-body p-3">
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <h5 class="card-title m-0" style="font-family: 'Poppins', sans-serif !important;"><?= $item->descricao_condominio?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <ul class="list-group list-group-horizontal justify-content-center" style="font-size:0.9375rem;">
                                                                        <li class="mr-2" style="font-family: 'Poppins', sans-serif !important;float:left; list-style:none; text-align:center"><i class="fa fa-arrows-alt "></i> <?php if($item->dimensoesDoTerreno) { echo $item->dimensoesDoTerreno; } else { echo '0';} ?>m² </li>
                                                                        <li class="mr-2" style="font-family: 'Poppins', sans-serif !important;float:left; list-style:none; text-align:center"><i class="fa fa-bed "></i> <?php if($item->rooms) { echo $item->rooms; } else { echo '0';} ?> quarto(s) </li>
                                                                        <li style="font-family: 'Poppins', sans-serif !important;float:left; list-style:none; text-align:center"><i class="fa fa-car "></i> <?php if($item->vagasGaragem) { echo $item->vagasGaragem; } else { echo '0';} ?> vagas(s) </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <span class="card-text" style="font-family: 'Poppins', sans-serif !important;color:#F58023; font-weight:bold">Valor R$ <?php if($item->valor) { echo number_format($item->valor, 2, ',', '.'); } else { echo '0';} ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label class="btn btn-warning p-2 mb-0 mx-auto" style="color:#fff; font-weight:500;">Ver Detalhes</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                </div>
                <div class="paginate d-flex justify-content-center">
                    <?php echo (isset($paginacao)) ? $paginacao : ''; ?>
                </div>
            </div>
        </div>
    </div>            
</section>
<!-- Traz as cordenadas da busca para montagem do mapa -->
<?php $jsonCords = json_encode($listaCords); ?>
<!-- Traz as cordenadas da busca para montagem do mapa -->
<script>
    var map;
    var InforObj = [];
    var centerCords = {
        lat: <?php if(!empty($listaCords[1]->lat)) { echo $listaCords[1]->lat; } else { echo '-5.069052'; }?>,
        lng: <?php if(!empty($listaCords[1]->lng)) { echo $listaCords[1]->lng; } else { echo '-42.785141'; } ?>
    };
    var jsonCords = <?php echo $jsonCords; ?>;
    console.log(jsonCords);
    window.onload = function () {
        init();
    };

    function init() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: centerCords
        });

        <?php if (!empty($listaCords)) { ?>
            <?php foreach ($listaCords as $k => $v)  { ?>
                <?php if (!empty($v->lat) && !empty($v->lng)) { ?>
                    new google.maps.Marker({
                        position : new google.maps.LatLng(<?= $v->lat ?>, <?= $v->lng ?>),
                        map : map,
                        title : "<?= $v->descricao_condominio ?>"
                    });
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if (empty($listaCords)) { ?>
            new google.maps.Marker({
                position : new google.maps.LatLng('-5.069052', '-42.785141'),
                map : map,
                title : "Seu Canto Imóveis"
            });     
        <?php } ?>
    }
</script>