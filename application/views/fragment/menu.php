<?php
$folder = $this->uri->segment(1);
?>
<nav class="navbar navbar-dark bg-primary navbar-expand-lg mb-5">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">RSUD dr. CHASBULLAH ABDULMADJID</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link <?= $folder == 'administrasi' ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>administrasi/form">Administrasi Data</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $folder == 'welcome' ? 'active' : '' ?>" href="<?= base_url() ?>welcome">Rekam Medis</a>
				</li>
				<li>
					<a class="nav-link <?= $folder == 'dokter' ? 'active' : '' ?>" href="<?= base_url() ?>dokter">Dokter</a>
				</li>
				<li>
					<a class="nav-link <?= $folder == 'departemen' ? 'active' : '' ?>" href="<?= base_url() ?>departemen">Departemen</a>
				</li>


			</ul>

		</div>
	</div>
</nav>
<div class="container">
	<p></p>