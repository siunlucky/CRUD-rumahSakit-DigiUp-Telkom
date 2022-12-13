<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>Detail dokter</h1>
<dl>
	<dt>ID Dokter</dt>
	<dd><?= $id ?></dd>
	<dt>Nama dokter</dt>
	<dd><?= $nama_dokter ?></dd>
</dl>
<a href='#' onclick="history.back()">Back</a>