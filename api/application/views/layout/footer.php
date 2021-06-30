<!-- Footer -->
<footer class="footer pt-0">
	<div class="row">
		<div class="col-12">
			<div class="copyright text-center text-warning">
				&copy; <?= date("Y") ?> <span class="font-weight-bold ml-1 text-warning" target="_blank">SeuCanto Imóveis</span>
			</div>
		</div>
		<!-- <div class="col-lg-6">
			<ul class="nav nav-footer justify-content-center justify-content-lg-end">
				<li class="nav-item">
					<a href="<?= site_url();?>" class="nav-link" target="_blank">Site SeuCanto</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('quemsomos');?>" class="nav-link" target="_blank">Quem Somos</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link" target="_blank">Parceiros</a>
				</li>

			</ul>
		</div> -->
	</div>
</footer>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
<!-- Optional JS -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/nouislider/distribute/nouislider.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="<?php echo base_url(); ?>assets/js/demo.min.js"></script>
<script>
	$.extend( $.fn.dataTable.defaults, {
		language: {
			url:'<?php echo base_url(); ?>assets/plugins/datatables/i18n/Portuguese-Brasil.json'
		}
	} )
</script>
</body>

</html>
