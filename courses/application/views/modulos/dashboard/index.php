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
							<h3 class="mb-0">Suas Visitas Cadastradas</h3>
						</div>
						<div class="table-responsive py-4">
							<table class="table table-flush" id="datatable-dashboard-site">
								<thead class="thead-light">
								<tr>
									<th>Seq.</th>
									<th>Imóvel.</th>
									<th>Endereço</th>
									<th>Dia Visita</th>
									<th>Horário</th>
									<th>Status</th>
									<th>Criado</th>
									<th>Docs.</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<th>Seq.</th>
									<th>Imóvel.</th>
									<th>Endereço</th>
									<th>Dia Visita</th>
									<th>Horário</th>
									<th>Status</th>
									<th>Criado</th>
									<th>Docs.</th>
								</tr>
								</tfoot>
								<tbody>
								<?php foreach ($listaVisitas as $item): ?>
									<tr>
									<td><?php echo $item->id; ?></td>
										<td><?php echo $item->codigo_imovel; ?></td>
										<td><?php $endereco = $item->endereco . ', ' . ($item->numeroEndereco ? $item->numeroEndereco : 'S/N') . ' ' . $item->bairro  . ', ' . $item->cidade . ' - ' . $item->estado; echo substr($endereco, 0, 30) . "..."; ?></td>
										<td><?php echo date("d/m/Y", strtotime($item->dia)); ?></td>
										<td><?php echo $item->horario; ?></td>
										<td>
											<?php  
												if ($item->status == 1) { echo "<span class='badge badge-warning'> Aguardando </span>";}  
												if ($item->status == 2) { echo "<span class='badge badge-primary'> Envio de Formulário </span>";}
												if ($item->status == 3) { echo "<span class='badge badge-warning'> Análise de Formulário</span>";} 
												if ($item->status == 4) { echo "<span class='badge badge-primary'> Envio de Documentação </span>";} 
												if ($item->status == 5) { echo "<span class='badge badge-warning'> Análise de Documentação </span>";} 
												if ($item->status == 6) { echo "<span class='badge badge-success'> Aprovado </span>";} 
												if ($item->status == 7) { echo "<span class='badge badge-danger'> Analisado </span>";}  
											?>
										</td>
										<td><?php echo date("d/m/Y H:i", strtotime($item->createdAt)); ?></td>
										<!-- <td class="td-actions">
											<a href="<?php echo site_url("horariosvisitas/editar/" . $item->id); ?>">
												<i class="fas fa-edit" style="color: gray"> </i>
											</a>
											<a href="<?php echo site_url("horariosvisitas/delete/" . $item->id); ?>">
												<i class="fas fa-trash" style="color: gray"> </i>
											</a>
										</td> -->
										
										<td class="td-actions">
											<?php  
												if ($item->status == 1) { echo "<a href='". site_url() . 'horariosvisitas/ficha_locatarios_criar/' . $item->id . "' class='btn btn-sm btn-warning'>Quero Alugar</a>";}  
												if ($item->status == 2) { echo "<a href='". site_url() . 'horariosvisitas/ficha_locatarios_criar/' . $item->id . "'><i class='fas fa-file' style='color: #2643e9'> </i></a>";}
												if ($item->status == 3) { echo "<i class='fas fa-ban' style='color: red'> </i>";} 
												if ($item->status == 4) { echo "<a href='". site_url() . 'horariosvisitas/ficha_locatarios_criar/' . $item->id . "'><i class='fas fa-id-card' style='color: #2643e9'> </i></a>";} 
												if ($item->status == 5) { echo "<i class='fas fa-ban' style='color: red'> </i>";} 
												if ($item->status == 6) {echo "<i class='fas fa-ban' style='color: red'> </i>";} 
												if ($item->status == 7) { echo "<i class='fas fa-ban' style='color: red'> </i>";}  
											?>
											
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/dashboard/js.js"></script>
	<script>
		$( document ).ready(function() {
			$('#datatable-dashboard-site').DataTable({
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
		});
	</script>