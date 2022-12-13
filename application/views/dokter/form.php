<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h3>
	<?= validation_errors(); ?>
</h3>
<form method="post" action="<?= base_url('dokter/save') ?>">
	<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" />
	<div>
		<label></label>
		<div>
			<h3>Tambah dokter</h3>
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Nama dokter</label>
		<div>
			<input class="form-control" type="text" name="nama_dokter" id="nama_dokter" value="<?= $nama_dokter ?? "" ?>" required />
		</div>
	</div>

	<div>
		<input class="btn btn-primary" type="button" value="Cancel" onclick="history.back()" />
		<input class="btn btn-danger" type="submit" value="Simpan" />
	</div>

</form>