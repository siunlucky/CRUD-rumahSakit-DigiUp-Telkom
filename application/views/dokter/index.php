<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<br>
<h1>List dokter</h1>
<div class="d-flex justify-content-end">
	<a class="btn btn-success btn-sm" href="<?= base_url("dokter/form") ?>">Tambah</a>
</div>
<table class="table table-striped">
	<tr>
		<th>ID Dokter</th>
		<th>Nama dokter</th>
		<th>Action</th>
	</tr>
	<br>
	<?php
	if (!empty($records)) {
		foreach ($records as $idx => $data) {
	?>
			<tr>
				<td><?= $data['id'] ?></td>
				<td><?= $data['nama_dokter'] ?></td>

				<td>
					<div class="btn-group">
						<a class="btn btn-primary btn-sm me-3" href="<?= base_url("dokter/detail/{$data['id']}") ?>">Detail</a>
						<a class="btn btn-warning btn-sm me-3" href="<?= base_url("dokter/form/{$data['id']}") ?>">Edit</a>
						<a class="btn btn-danger btn-sm me-3" onclick="return confirm('menghapus data?')" href="<?= base_url("dokter/hapus/{$data['id']}") ?>">Hapus</a>
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
	<br>
</table>
<br>
<?php
include APPPATH . 'views/fragment/footer.php';
?>