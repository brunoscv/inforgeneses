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
							<h3 class="mb-0">Detalhes do Curso</h3>
						</div>
						<div class="table-responsive py-4" id="course-detail"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Script Template Mustache -->
	<script id="courses-template" type="x-tmpl-mustache">
        <div class="row col-xl-12">
            <div class="col-xl-3">
                <img src="{{image}}">
            </div>
            <div class="col-xl-9">
                <p>Nome do Curso: {{name}}</p>
                <p>Categoria: </p>
                <p>Descrição: {{description}}</p>
                <p>Preço: {{price}}</p>
            </div>
        </div>
        <div class="col-xl-12 text-center">
            <button class="btn btn-warning"><i class="fa fa-cart-plus mr-2"></i>Adicionar ao carrinho</button>
        </div>
       
	</script>
	<!-- Script Template Mustache -->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/courses/js.js"></script>
	<script>
		jQuery(function() {
            var course_id = <?= $course_id; ?>;
			function get_all_courses(){
				$.ajax({
					type: "get",
					url: "<?= api_url(); ?>/api/v1/courses/" + course_id,
					cache: false,               
					//data: $('#userForm').serialize(),
					beforeSend:function(){
						$('#course-detail').html("<div class='col-xl-12 text-center'><i class='fa fa-2x fa-spin fa-spinner align-middle'></i></div>");
                        
					},
					complete:function(data){},
					success: function(json){
                        $('#course-detail').html("");
                        try{
                            
                            var template = $('#courses-template').html();
                            Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json);
                            $('#course-detail').append(rendered);
                            
                            toastr.success("Cursos carregados com sucesso.");	
                        } catch(e) {     
                            toastr.warning("Não foram encontrados cursos cadastrados");
                        }
					},
					error: function(e){     
                        $('#course-detail').html("<tr><td colspan='5' style='text-align:center'>Nenhum resultado encontrado</td></tr>");                 
						toastr.error("Houve um erro no seu pedido. Tente novamente!");
					}
				});
			}
			get_all_courses();
		});
	</script>