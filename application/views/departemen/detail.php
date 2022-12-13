<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>Detail Departemen</h1>
<dl>
	<dt>Nama Departemen</dt>
	<dd><?= $nama_departemen ?></dd>
</dl>
<a href='#' onclick="history.back()">Back</a>
