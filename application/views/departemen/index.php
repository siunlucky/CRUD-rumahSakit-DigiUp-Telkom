<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<br>
<h1>List Departemen</h1>
<div class="d-flex justify-content-end">
	<a class="btn btn-success btn-sm" href="<?= base_url("departemen/form") ?>">Tambah</a>
</div>
<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>Nama Departemen</th>
		<th>Aksi</th>
	</tr>
	<br>
	<?php	
	foreach ($records as $idx => $data) {
	?>
		<tr>
			<td><?= $idx + 1 ?></td>
			<td><?= $data['nama_departemen'] ?></td>
			<td>
				<div class="btn-group">
					<a class="btn btn-primary btn-sm me-3" href="<?=base_url("departemen/detail/{$data['id']}") ?>">Detail</a>
					<a class="btn btn-warning btn-sm me-3" href="<?= base_url("departemen/form/{$data['id']}") ?>">Edit</a>
					<a class="btn btn-danger btn-sm me-3" onclick="return confirm('menghapus data?')" href="<?=base_url("departemen/hapus/{$data['id']}") ?>">Hapus</a>
				</div>
			</td>
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
