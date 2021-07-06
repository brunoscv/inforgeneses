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
					<a href="<?= site_url()?>courses" class="btn btn-sm btn-neutral">Voltar</a>
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
								<tbody id="courses-table"></tbody>
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
			<td><a href="#" id='a-course-details' course_id={{id}}>{{description}}</a></td>
			<td>{{price}}</td>
			<td>{{image}}</td>
			<td>
			<button type='button' id='btn-course-edit' course_id={{id}} class='btn btn-sm btn-warning'> <i class='fa fa-edit'></i></button>
			<button type='button' id='btn-course-delete' class='btn btn-sm btn-danger'> <i class='fa fa-trash'></i></button></td>
		</tr>	
	</script>
	<!-- Script Template Mustache -->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/courses/js.js"></script>
	<script>
		jQuery(function() {
			$('body').on('click', '#a-course-details', function(event) {
				event.preventDefault();
				var course_id = $(this).attr('course_id');
				window.location.href="<?= site_url()?>courses/details/" + course_id;
			});
			function get_all_courses(){
				$.ajax({
					type: "get",
					url: "<?= api_url(); ?>/api/v1/courses",
					cache: false,               
					//data: $('#userForm').serialize(),
					beforeSend:function(){
						$('#courses-table').html("<tr><td colspan='5' style='text-align:center'><i class='fa fa-2x fa-spin fa-spinner align-middle'></i></td></tr>");
					},
					complete:function(data){},
					success: function(json){
						if ( json.length > 0 ) {
							$('#courses-table').html("");
							try{
								for (var i in json) {
									var template = $('#courses-template').html();
									Mustache.parse(template); // optional, speeds up future uses
									var rendered = Mustache.render(template, json[i]);
									$('#courses-table').append(rendered);
								}
								toastr.success("Curso carregado com sucesso.");	
							} catch(e) {     
								toastr.warning("Não foram encontradas informações sobre esse curso");
							}
						}
						if(json.length <= 0) {
							$('#courses-table').html("<tr><td colspan='5' style='text-align:center'>Nenhum resultado encontrado</td></tr>");
							toastr.warning("Não foram encontrados cursos cadastrados");
						}
					},
					error: function(){                      
						toastr.error("Houve um erro no seu pedido. Tente novamente!");
					}
				});
			}
			get_all_courses();
		});
	</script>