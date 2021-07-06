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
                <div class="col-lg-6 col-5 text-right">
					<!-- <a href="#" class="btn btn-sm btn-neutral">New</a> -->
					<a href="<?= site_url()?>courses" class="btn btn-sm btn-neutral"><i class="fa fa-list mr-2"></i>Listagem</a>
				</div>
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
                        
						<div class="table-responsive py-4">
                            <div class="row col-xl-12">
                                <div class="col-xl-3">
                                    <img src="<?=base_url();?>public/uploads/courses/angular.jpg" alt="">
                                </div>
                                <div class="col-xl-9" id="course-detail"></div>
                                <div class="col-xl-12 text-center" id="btn-cart"></div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Script Template Mustache -->
	<script id="courses-template" type="x-tmpl-mustache">
        <p>Nome do Curso: {{name}}</p>
        <p>Categoria: {{category_description}}</p>
        <p>Descrição: {{course_description}}</p>
        <p>Preço: {{price}}</p>
	</script>
    <script id="btn-cart-template" type="x-tmpl-mustache">
        <div class="col-xl-12">
            <button class="btn btn-warning" id="{{id}}" course_id={{course_id}}><i class="fa fa-cart-plus mr-2"></i>{{button_text}}</button>
        </div>
    </script>
	<!-- Script Template Mustache -->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/courses/js.js"></script>
	<script>
		jQuery(function() {
            var course_id = <?= $course_id; ?>;
            var user_id = <?= $user_id; ?>;
			function get_course_detail(){
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
			get_course_detail();

            function get_btn_cart_detail(){
				$.ajax({
					type: "get",
					url: "<?= api_url(); ?>/api/v1/carts/active/" + user_id + "/" + course_id,
					cache: false,               
					//data: $('#userForm').serialize(),
					beforeSend:function(){
						$('#btn-cart').html("<div class='col-xl-12 text-center'><i class='fa fa-2x fa-spin fa-spinner align-middle'></i></div>");
					},
					complete:function(data){},
					success: function(json){
                        $('#btn-cart').html("");
                        try{
                            var template = $('#btn-cart-template').html();
                            Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json);
                            $('#btn-cart').append(rendered);
                            
                        } catch(e) {     
                        }
					},
					error: function(e){     
                        $('#btn-cart').html("<tr><td colspan='5' style='text-align:center'>Nenhum resultado encontrado</td></tr>");                 
					}
				});
			}
			get_btn_cart_detail();

            $('body').on('click', '#btn-add-cart', function(event) {
				event.preventDefault();

                $.ajax({
					type: "post",
					url: "<?= api_url(); ?>/api/v1/carts/",
					cache: false,               
					//data: $('#userForm').serialize(),
                    data: {
                        courses_id: course_id,
                        users_id: user_id
                    },
					beforeSend:function(){
						$($(this)).html("<div class='col-xl-12 text-center'><i class='fa fa-2x fa-spin fa-spinner align-middle'></i></div>");
					},
					complete:function(data){},
					success: function(json){
                        
					},
					error: function(e){     
                        $($(this)).html("<tr><td colspan='5' style='text-align:center'>Nenhum resultado encontrado</td></tr>");                 
						toastr.error("Houve um erro no seu pedido. Tente novamente!");
					}
				});
				
			});
		});
	</script>