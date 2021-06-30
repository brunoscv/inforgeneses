<!DOCTYPE html>
<html lang="en">


<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Canto Imóveis</title>
	
	
	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/favicon.png" type="image/png">
	<!-- CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
	<style>
		body {
			background-color: rgba(245,129,56,1);
			color: rgba(255,255,255,1);
			/* background: url('<?= base_url();?>assets/img/theme/embreve.png');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center; */
			/* background: linear-gradient(180deg, rgba(245,129,56,1) 60%, rgba(245,129,56,1) 80%, rgba(255,255,255,1) 100%); */
		}
		#logo {
			height: 12rem;
		}
		#logo-mobile {
			height: 5rem;
		}
	</style>


</head>


<body>
	<div class="container-fluid d-flex flex-column justify-content-between vh-100">
		<div>
			<div class="container">
				<div class="row">
					<div class="col-12 py-3 d-flex justify-content-center d-md-none">
						<img id="logo-mobile" src="<?= base_url();?>assets/img/theme/logo-seucanto-branco.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-5 offset-lg-1 text-center text-md-left">
						<h1 style="color:#ffdf00;"><em>Em Breve</em></h1>
						<h1 class="mb-0"><strong>um novo site</strong></h1>
						<h1 class="mb-0"><strong>para encontrar</strong></h1>
						<h1><strong>seu canto</strong></h1>
					</div>
					<div class="col-md-6 col-lg-5 d-none d-md-flex justify-content-center py-2">
						<img id="logo" src="<?= base_url();?>assets/img/theme/logo-seucanto-branco-vertical.svg">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-12 pt-3 pb-1">
						<img class="w-100" src="<?= base_url();?>assets/img/theme/rodape.png">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JQuery -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	<!-- Bootstrap -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> -->

	
</body>


</html>