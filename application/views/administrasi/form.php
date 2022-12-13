<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<form method="post" action="<?= base_url('administrasi/save') ?> " enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" />
	<div>
		<label></label>
		<div>
			<h3>Tambah Data</h3>
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Rekam Medis</label>
		<div>
			<input class="form-control" type="text" name="no_rm" id="no_rm" value="<?= $no_rm ?? '' ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Nama Pasien</label>
		<div>
			<input class="form-control" type="text" name="nama_pasien" id="nama_pasien" value="<?= $nama_pasien ?? '' ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Alamat</label>
		<div>
			<input class="form-control" type="textarea" name="alamat" id="alamat" value="<?= $alamat ?? '' ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Jenis Kelamin</label>
		<select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
			<option selected disabled>Open this select menu</option>
			<option value="pria">Pria</option>
			<option value="wanita">Wanita</option>
		</select>
	</div>
	<div class="row mb-3">
		<label class="form-label">Tanggal Lahir</label>
		<div>
			<input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $tgl_lahir ?? '' ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Dokter</label>
		<select name="id_dokter" class="form-select" id="id_dokter">
			<option selected disabled>Open this select menu</option>
			<?php
			foreach ($dokters as $dokter) {
			?>
				<option value="<?php echo $dokter["id"] ?>"><?php echo $dokter["nama_dokter"] ?></option>
			<?php
			}
			?>
		</select>
	</div>
	<div class="row mb-3">
		<label class="form-label">Departemen</label>
		<select name="id_departemen" class="form-select" id="id_departemen">
			<option selected disabled>Open this select menu</option>
			<?php
			foreach ($departemens as $departemen) {
			?>
				<option value="<?php echo $departemen["id"] ?>"><?php echo $departemen["nama_departemen"] ?></option>
			<?php
			}
			?>
		</select>
	</div>
	<div class="row mb-3">
		<label class="form-label">Diagnosa</label>
		<div>
			<input class="form-control" type="text" name="diagnosa" id="diagnosa" value="<?= $diagnosa ?? '' ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">No Ruangan</label>
		<div>
			<input class="form-control" type="text" name="no_ruangan" id="no_ruangan" value="<?= $no_ruangan ?? '' ?>" required />
		</div>
	</div>

	<input class="btn btn-danger" type="submit" value="Simpan" />

</form>