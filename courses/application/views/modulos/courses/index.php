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
							<table class="table table-flush">
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
								<tbody id="teste"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Script Template Mustache -->
	<script id="courses-template" type="x-tmpl-mustache">
		
		<tr>
			<td>{{id}}</td>
			<td>{{description}}</td>
			<td>{{price}}</td>
			<td>{{image}}</td>
			<td><button type='button' id='btn-course-{{id}}'' class='btn btn-sm btn-warning'> <i class='fa fa-edit'></i></button></td>
		</tr>	
		
	</script>
	<!-- Script Template Mustache -->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/courses/js.js"></script>
	<script>
		jQuery(function() {

			function get_all_courses(){
				$.ajax({
					type: "get",
					url: "<?= api_url(); ?>/api/v1/courses",
					cache: false,               
					//data: $('#userForm').serialize(),
					beforeSend:function(){
						$(this).html("<i class='fa fa-2x fa-spin fa-spinner align-middle'></i>");
					},
					complete:function(data){},
					success: function(json){                        
						try{
							for (var i in json) {
								var template = $('#courses-template').html();
								Mustache.parse(template); // optional, speeds up future uses
								var rendered = Mustache.render(template, json[i]);
								$('#teste').append(rendered);

							}
							toastr.success("Cursos carregados com sucesso.");
						} catch(e) {     
							alert('Não foi possivel encontrar resultados');
						}		
					},
					error: function(){                      
						alert('Houve algum erro no pedido. Tente novamente');
					}
				});
			}
			get_all_courses();
		});
	</script>