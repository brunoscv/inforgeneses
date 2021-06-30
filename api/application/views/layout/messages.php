<?php if( !empty($this->data['msg_error']) ): ?>
<div class="modal fade" id="modal-notification-atencao" tabindex="-1" role="dialog" aria-labelledby="modal-notification-atencao" aria-hidden="true">
	<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-danger">
			<div class="modal-header">
				<h6 class="modal-title" id="">Atenção!</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<i class="ni fa fa-ban ni-3x"></i>
					<p class="mb-3 mt-3"><strong><?php echo $this->data['msg_error']; ?></strong></p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-link text-white ml-auto" data-dismiss="modal">
					Fechar
				</a>
			</div>
		</div>
	</div>
</div>
<script>
	function abreModal() {
	$("#modal-notification-atencao").modal({
		show: true
		});
	}
	setTimeout(abreModal, 150);
</script>
<?php endif; ?>

<?php if( !empty($this->data['msg_success']) ): ?>
<div class="modal fade" id="modal-notification-success" tabindex="-1" role="dialog" aria-labelledby="modal-notification-success" aria-hidden="true">
	<div class="modal-dialog modal-success modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-success">
			<div class="modal-header">
				<h6 class="modal-title" id="">Sucesso!</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<i class="ni fa fa-check ni-3x"></i>
					<p class="mb-3 mt-3"><strong><?php echo $this->data['msg_success']; ?></strong></p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-link text-white ml-auto" data-dismiss="modal">
					Fechar
				</a>
			</div>
		</div>
	</div>
</div>
<script>
	function abreModal() {
	$("#modal-notification-success").modal({
		show: true
		});
	}
	setTimeout(abreModal, 150);
</script>
<?php endif; ?>

<?php if( !empty($this->data['msg_empty']) ): ?>
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert">
		×
	</button>
	<strong><i class="fa fa-exclamation"></i></strong> <?php echo $this->data['msg_empty']; ?>
</div>
<?php endif; ?>