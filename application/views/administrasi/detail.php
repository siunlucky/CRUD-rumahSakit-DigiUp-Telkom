<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<div class="card col-sm-8 container d-flex align-items-left justify-content-center">
	<div class="card-body">
		<h5 class="card-title"><?= $no_rm ?></h5>
		<dl>
			<dt>Nama Pasien</dt>
			<dd><?= $nama_pasien ?></dd>
			<dt>Alamat</dt>
			<dd><?= $alamat ?></dd>
			<dt>Jenis Kelamin</dt>
			<dd><?= $jenis_kelamin ?></dd>
			<dt>Tanggal Lahir</dt>
			<dd><?= $tgl_lahir ?></dd>
			<dt>Dokter</dt>
			<dd><?= $nama_dokter ?></dd>
			<dt>Nama Departemen</dt>
			<dd><?= $id_departemen ?></dd>
			<dt>Diagnosa</dt>
			<dd><?= $diagnosa ?></dd>
			<dt>No ruangan</dt>
			<dd><?= $no_ruangan ?></dd>
		</dl>
		<a class="btn btn-outline-danger" href='#' onclick="history.back()">Back</a>
	</div>
</div>
<?php
include APPPATH . 'views/fragment/footer.php';
?>