<!-- Footer -->
<footer class="footer pt-0 pb-3">
	<div class="row align-items-center justify-content-lg-between">
		<div class="col-lg-6">
			<div class="copyright text-center text-lg-left text-warning">
				&copy; <?= date("Y") ?> <a href="#" class="font-weight-bold ml-1 text-warning" target="_blank">SeuCanto
					Imóveis</a>
			</div>
		</div>
		<div class="col-lg-6">
			<ul class="nav nav-footer justify-content-center justify-content-lg-end">
				<li class="nav-item">
					<a href="<?= site_url();?>" class="nav-link" target="_blank">Site SeuCanto</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('quemsomos');?>" class="nav-link" target="_blank">Quem Somos</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('parceirosite');?>" class="nav-link" target="_blank">Parceiros</a>
				</li>

			</ul>
		</div>
	</div>
</footer>
</div>

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
<script src="<?php echo base_url(); ?>assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="<?php echo base_url(); ?>assets/js/demo.min.js"></script>
<!-- 3. AddChat JS -->
  <!-- Modern browsers -->
  <!-- <script  type="module" src="<?php echo base_url() ?>assets/addchat/js/addchat.min.js"></script> -->
  <!-- Fallback support for Older browsers -->
  <!-- <script nomodule src="<?php echo base_url() ?>assets/addchat/js/addchat-legacy.min.js"></script> -->
<script>
	$.extend( $.fn.dataTable.defaults, {
		language: {
			url:'<?php echo base_url(); ?>assets/plugins/datatables/i18n/Portuguese-Brasil.json'
		}
	} )
</script>
</body>

</html>
