<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>Administrasi Data Pasien dan Tindakan</h1>
<form method="get" action="<?= base_url('welcome/index') ?>">
	<div class="mb-3">
		<input class="form-control" placeholder="Cari Rekam Medis " type="text" name="search" id="search" />

	</div>
	<div class="mb-3">
		<a href="<?= base_url("administrasi/form") ?>" type="button" class="btn btn-primary">Tambah</a>
	</div>
</form>
<?php
if (isset($search)) {
	echo "<h4 class='alert alert-success'>Hasil pencarian untuk : " . $search . "</h4>";
}
?>
<div class="row">
	<table class="table table-striped">
		<tr>
			<th>Rekam Medis</th>
			<th>Nama Pasien</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>ID Dokter</th>
			<th>ID Departemen</th>
			<th>Diagnosa</th>
			<th>Nomor Ruangan</th>
			<th>Action</th>
		</tr>

		<?php
		if (!empty($records)) {
			foreach ($records as $idx => $data) {
		?>
				<tr>
					<td><?= $data['no_rm'] ?></td>
					<td><?= $data['nama_pasien'] ?></td>
					<td><?= $data['alamat'] ?></td>
					<td><?= $data['jenis_kelamin'] ?></td>
					<td><?= $data['tgl_lahir'] ?></td>
					<td><?= $data['id_dokter'] ?></td>
					<td><?= $data['nama_departemen'] ?></td>
					<td><?= $data['diagnosa'] ?></td>
					<td><?= $data['no_ruangan'] ?></td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary btn-sm me-3" href="<?= base_url("administrasi/detail/{$data['id']}") ?>">Detail</a>
							<a class="btn btn-warning btn-sm me-3" href="<?= base_url("administrasi/form/{$data['id']}") ?>">Edit</a>
							<a class="btn btn-danger btn-sm me-3" onclick="return confirm('menghapus data?')" href="<?= base_url("administrasi/hapus/{$data['id']}") ?>">Hapus</a>
						</div>
					</td>
				</tr>
			<?php

			}
		} else {
			?>
			<tr>
				<td>Tidak ada Data</td>
			</tr>
		<?php
		}

		?>

	</table>

</div>
<?php
if (isset($links)) {
	echo $links;
}
include APPPATH . 'views/fragment/footer.php';
?>