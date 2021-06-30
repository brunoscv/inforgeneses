<style>
	.background-image {
		height: 700px;
		width: 100%;
		text-align: center;
		background: url('<?= base_url();?>assets/img/theme/imagem-home.png') no-repeat;
		background-size: cover;
		/* background-attachment: fixed; */
		background-repeat: no-repeat;
		background-position: center; 
	}

	input{
		border:none;
		background-color: transparent;
	}
	input:focus,
	select:focus,
	textarea:focus,
	button:focus {
		outline: none;
	}

	.fa-user-circle-o{
		color: gray;
	}

	.input-group{
		border: none;
		padding: 10px;
	}

	.header-text {
			padding:10rem;
		}

	@media only screen and (max-width: 480px) {
		.background-image {
			height: 200px;
		}
		.header-text {
			padding:0;
		}
	}

	.card-border {
		border: 1px orange solid;
	}
</style>
<style type="text/css">
	.slick-prev {   
	position: absolute;
	border: none;
	top: 50%;
	left: -1.4rem;
	z-index: 1;
	-webkit-transform: translate(0, -50%);
	-ms-transform: translate(0, -50%);
	transform: translate(0, -50%);
	}

	.slick-prev:before {
	content: '←';
	}

	.slick-next {
	position: absolute;
	border: none;
	top: 50%;
	right: -.4rem;
	z-index: 1;
	-webkit-transform: translate(0, -50%);
	-ms-transform: translate(0, -50%);
	transform: translate(0, -50%);
	}
	.slick-next:before {
	content: '→';
	}

	.slick-prev:before, .slick-next:before {
	font-family: 'slick';
	font-size: 2.25rem;
	line-height: 1;
	opacity: .75;
	color: white;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	color:#fb6340;
	}
</style>
<!-- <div class="background-image bg-white">
	<div class="header-body text-center header-text">
		<div class="justify-content-center">
			<div class="container">
				<div class="row row-grid justify-content-center">
					<div class="col-lg-8 text-center">
						<h2 class="display-3 text-white" style="">ENCONTRE SEU CANTO</h2>
						<p class="text-white f-bold" style="">O JEITO MAIS PRÁTICO DE ALUGAR E COMPRAR SEU IMÓVEL</p>
						<div class="row justify-content-center">
							<form id="form_imoveis" class="form-horizontal" style="width:100%" action="<?php echo site_url('homepage/search/all/'); ?>" method="get" enctype="multipart/form-data">
								<div class="form-row">
									<div class="col-md-12 mt-3">
										<div class="input-group shadow-none">
											<input type="text" class="form-control border-0" placeholder="Endereço, bairro, cidade ou CEP" name="searchquery" style="height:calc(1.5em + 1.25rem + 2px)" />
											<div class="input-group-append">
												<button type="submit" class="btn btn-secondary bg-white border-0 shadow-none">
													<i class="fa fa-search"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</form>      
						</div>   
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- HOME SEARCH -->
<style>
#navbar-main {
	min-height: 4.0625rem;
	height: 4.0625rem;
	max-height: 4.0625rem;
}
#home-search {
	background: url('<?php echo base_url(); ?>assets/img/theme/imagem-home-2.jpg') no-repeat;
		background-color: rgba(0, 0, 0, 0);
		background-position-x: 0%;
		background-position-y: 0%;
		background-repeat: no-repeat;
		background-size: auto;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	height: calc(100vh - 4.0625rem);
}
#home-search #inp-search {
	max-width: 34.125rem;
}
#home-search span {
	line-height: 1;
	font-family: 'Poppins', sans-serif !important;
}
#home-search span:nth-child(1) {
	font-size: 2rem;
	font-size: clamp(1.875rem, 4vw, 2.5rem);
}
#home-search span:nth-child(2) {
	font-size: 1rem;
	font-size: clamp(.875rem, 2vw, 1.25rem);
}
</style>
<div id="home-search" class="bg-white w-100 d-flex align-items-center justify-content-center">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 py-3 text-center">
				<div class="mb-4 d-flex flex-column">
					<span class="text-white">ENCONTRE SEU CANTO</span>
					<span class="text-white">O JEITO MAIS PRÁTICO DE ALUGAR E COMPRAR SEU IMÓVEL</span>
				</div>
				<form id="form_imoveis" class="form-horizontal" action="<?php echo site_url('homepage/search/all/'); ?>" method="get" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-12 d-flex justify-content-center">
							<div id="inp-search" class="input-group shadow-none p-0">
								<input type="text" class="form-control border-0" placeholder="Endereço, bairro, cidade ou CEP" name="searchquery">
								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary bg-white border-0 shadow-none">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END HOME SEARCH -->
<div class="" style="background: linear-gradient(to bottom, #fff 0, #d8d8d8 100%) !important;">
<!-- RESOLVA EM POUCOS CLIQUES -->
<!-- <section class="py-5" style="min-height:calc(100vh - 4.0625rem);"> -->
<section class="py-5">
	<div class="container">
		<div class="row row-grid justify-content-center">
			<div class="col-12 text-center"> 
				<h2 class="display-3" style="color:#F58023; ">Resolva em poucos cliques</h2>
				<h2 class="display-5" style="color:#000; ">Mais prático e mais rápido!</h2>
				<div class="orange-line pt-5 mb-5" style="width:10em; border-bottom: 2px #F58023 solid; margin: 0 auto;"></div>
				<div class="row justify-content-center">
					<div class="col-10 col-md-4 mb-3 mb-md-0">
						<div class="row justify-content-center h-100">
							<div class="col-12">
								<div class="card card-border h-100 m-0">
									<img class="img-fluid" alt="100%x280" style="border-radius: 5px 5px 0px 0px;" src="<?=base_url();?>assets/img/theme/seucanto-alugue.png">
									<div class="card-body d-flex flex-column justify-content-between">
										<h2 class="card-title" style="color:#000; ">Quero alugar</h2>
										<p class="card-text" style=" color:#000; line-height:1em; font-size: 0.9em;">Sem fiador, seguro-fiança ou depóstico caução e nada de fila no cartório.</p>
										<a href="<?= site_url();?>homepage/search/alugar/" class="btn btn-warning mt-3" style=" font-weight:300">BUSCAR</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-10 col-md-4 mb-3 mb-md-0">
						<div class="row justify-content-center h-100">
							<div class="col-12">
								<div class="card card-border h-100 m-0">
									<img class="img-fluid" alt="100%x280" style="border-radius: 5px 5px 0px 0px;" src="<?=base_url();?>assets/img/theme/seucanto-venda.png">
									<div class="card-body d-flex flex-column justify-content-between">
										<h2 class="card-title" style="color:#000; ">Quero anunciar</h2>
										<p class="card-text" style=" color:#000; line-height:1em; font-size: 0.9em;">Anúncio online e aluguel rápido: recebimento em dia, independente do pagamento do inquilino.</p>
										<a href="<?= site_url();?>anuncie" class="btn btn-warning mt-3" style=" font-weight:300">ANUNCIAR</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-10 col-md-4 mb-3 mb-md-0">
						<div class="row justify-content-center h-100">
							<div class="col-12">
								<div class="card card-border h-100 m-0">
									<img class="" alt="100%x280" style="border-radius: 5px 5px 0px 0px;" src="<?=base_url();?>assets/img/theme/seucanto-compre.png">
									<div class="card-body d-flex flex-column justify-content-between">
										<h2 class="card-title" style="color:#000;">Quero comprar</h2>
										<p class="card-text" style="color:#000; line-height:1em; font-size: 0.9em;">Conte com a ajuda dos nossos consultores em todo o processo: transparência de custos e segurança no pagamento.</p>
										<a href="<?= site_url();?>homepage/search/comprar/" class="btn btn-warning mt-3" style=" font-weight:300">ENCONTRAR</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  
			</div>
		</div>
	</div>
</section>
<!-- END RESOLVA EM POUCOS CLIQUES -->
<!-- DESTAQUES -->
<!-- <section class="pb-5 py-md-5" style="min-height:calc(100vh - 4.0625rem);"> -->
<section class="pb-5 py-md-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h2 class="display-3 mb-3" style="color:#F58023!important;">Destaques</h2>
				<!-- <h2 class="display-5" style="color:#000;">Os mais procurados, com as melhores condições!</h2> -->
				<!-- <div class="orange-line pt-5 mb-5" style="width:10em; border-bottom: 2px #F58023 solid; margin: 0 auto;"></div> -->
			</div>
		</div>
		<div class="row justify-content-center text-center">
			<div class="col-10 col-md-12">
				<div id="slick-two" class="">
					<?php foreach ($imoveis_destaques as $imovel) { ?>
					<div class="m-3">
						<a href="<?= site_url("perfilimoveis/index/").$imovel->id;?>">
							<div class="card mb-0">
								<img class="img-fluid rounded-top" alt="100%x280" src="<?php if($imovel->caminho) { echo "https://seucantoimoveis.com.br/seucanto/admin/{$imovel->caminho}/{$imovel->descricao}" ; } else { echo 'https://seucantoimoveis.com.br/seucanto/site/assets/img/theme/default-image.png';} ?>" style="height: 12em !important;"/>
								<div class="card-body">
								<h5 class="card-title mb-3" style="min-height:2.5rem;"><?= $imovel->descricao_condominio;?></h5>
								<ul class="d-inline-flex justify-content-center mb-3 p-0" style="width: 100%;display: inline-flex; min-height: 3rem;">
									<li class="small-item mr-3" style="float:left; list-style:none; text-align:center">
										<i class="fa fa-arrows-alt mr-1"></i>
										<?php if($imovel->dimensoesDoTerreno) { echo $imovel->dimensoesDoTerreno; } else { echo '0';} ?>m²
									</li>
									<li class="small-item mr-3" style="float:left; list-style:none; text-align:center">
										<i class="fa fa-bed mr-1"></i> 
										<?php if($imovel->numQuartos) { echo $imovel->numQuartos; } else { echo '0';} ?> quarto(s) 
									</li>
									<li class="small-item mr-3" style="float:left; list-style:none; text-align:center">
										<i class="fa fa-car "></i> 
										<?php if($imovel->vagasGaragem) { echo $imovel->vagasGaragem; } else { echo '0';} ?> vagas(s) 
									</li>
								</ul>
								<p class="mb-3">
									<span class="card-text" style="color:#F58023; font-weight:bold">Valor R$ <?php if($imovel->valor) { echo number_format($imovel->valor, 2, ',', '.'); } else { echo '0';} ?></span>
								</p>
								<p class="text-center">
									<label class=" btn btn-warning p-2 mb-0" style="color:#fff; font-weight:500;">Ver Detalhes</label>
								</p>
								</div>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END DESTAQUES -->
</div>

<section class="py-5" style="background-color:#F58138">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<h2 class="display-4 text-white m-0">Respeito à sua liberdade</h2>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<div class="row justify-content-center"> 
					<div class="col-10 col-md-4">
						<!-- <span class="icon-category-card fa fa-calendar"></span>  -->
						<div class="category-card" style="text-align:center; background: #F58138;"> 
							<img src="<?=base_url();?>assets/img/theme/inteligencia.png" alt="" style="width:7rem">
						</div>
						<h4 class="sub-category-card text-center text-white pt-3 pb-3" style="text-transform: uppercase; font-weight:300">NÃO PERCA <?php echo "<br>";?>TEMPO</h4> 
						<p class="text-center" style=" color:#000">Você consegue fazer todo o processo on line, sem precisar ir até a imobiliária. Controle cada passo do seu aluguel com a gente!</p>
					</div> 
					<div class="col-10 col-md-4">
						<!-- <span class="icon-category-card fa fa-calendar"></span>  -->
						<div class="category-card" style="text-align:center; background: #F58138;"> 
							<img src="<?=base_url();?>assets/img/theme/descomplicar.png" alt="" style="width:9rem">
						</div>
						<h4 class="sub-category-card text-center text-white pt-3 pb-3" style="text-transform: uppercase; font-weight:300">Tecnologia e inteligência para descomplicar</h4> 
						<p class="text-center" style=" color:#000">Usamos a tecnologia para facilitar a sua experiência de encontrar ou anunciar um imóvel. Administração profissional e aluguel mais rápido.</p>
					</div> 
					<div class="col-10 col-md-4">
						<!-- <span class="icon-category-card fa fa-calendar"></span>  -->
						<div class="category-card" style="text-align:center; background:#F58138;"> 
							<img src="<?=base_url();?>assets/img/theme/presencial.png" alt="" style="width:9rem">
						</div>
						<h4 class="sub-category-card text-center text-white pt-3 pb-3" style="text-transform: uppercase; font-weight:300">Prefere um atendimento <?php echo "<br>";?>presencial?</h4> 
						<p class="text-center" style=" color:#000"><span><u><b><a href="<?= site_url('quemsomos');?>" style="color: #000">Visite nosso escritório!</a></b></u><br/></span>Temos uma equipe antenada com a realidade da cidade e pronta para te ajudar com o cadastro e tudo que envolve a gestão do seu imóvel.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$('#slick-two').slick({
		dots: false,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 2000,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				}
			},
			{
				breakpoint: 992,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1
				}
			}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});
</script>