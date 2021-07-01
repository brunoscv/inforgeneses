<!-- Cards Header -->
<div class="header bg-gradient-template pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Default</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Default</li>
						</ol>
					</nav>
				</div>
			<!-- <div class="col-lg-6 col-5 text-right">
				<a href="#" class="btn btn-sm btn-neutral">New</a>
				<a href="#" class="btn btn-sm btn-neutral">Filters</a>
			</div> -->
			</div>
		</div>
	</div>
</div>

		
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col-xl-12">
			<div class="row">
				<div class="col">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<h3 class="mb-0">Seus Cursos</h3>
						</div>
						<div class="table-responsive py-4">
							<table class="table table-flush" id="datatable-courses">
								<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Preço</th>
									<th>Imagem</th>
									<th>Ações</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Preço</th>
									<th>Imagem</th>
									<th>Ações</th>
								</tr>
								</tfoot>
								<tbody>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/courses/js.js"></script>
	<script>
		$( document ).ready(function() {
			$('#datatable-courses').DataTable({
				//"pagingType": "full_numbers",
				// "lengthMenu": [
				// 	[25, 50, 75, 100, -1],
				// 	[25, 50, 75, 100, "All"]
				// ],
				"bFilter": true,
				responsive: true,
				order: [[0, "desc"]],
				language: {
					paginate: {
						previous: "<i class='fas fa-angle-left'>",
						next: "<i class='fas fa-angle-right'>"
					}
				}
			});

			function makeAjaxCall(){
				$.ajax({
					type: "get",
					url: "<?= api_url(); ?>",
					cache: false,               
					data: $('#userForm').serialize(),
					success: function(json){                        
					try{        
						var obj = jQuery.parseJSON(json);
						alert( obj['STATUS']);


					}catch(e) {     
						alert('Exception while request..');
					}       
					},
					error: function(){                      
						alert('Error while request..');
					}
			});

			makeAjaxCall();
}




		});
	</script>