<!-- Popper -->
<script src="<?= base_url("assets/vendor/popper/popper.min.js") ?>"></script>

<!-- Bootstrap -->
<script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.min.js") ?>"></script>

<!-- jQuery UI -->
<script src="<?= base_url("assets/vendor/jquery-ui/jquery-ui.min.js") ?>"></script>

<!-- Modal Feedback Show -->
<?php if($this->session->flashdata('modal_message')) { ?>
	<?= $this->session->flashdata('modal_message') ?>
	<script>
		$(window).on('load',function(){
			$('#modalFeedback').modal('show');
		});
	</script>
<?php } ?>

</body>
</html>