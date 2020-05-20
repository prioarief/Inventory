<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="section-body">
			<div class="col-12">
				<div class="container">
					<?php if ($this->session->flashdata('alert')) : ?>
						<div class="alert alert-success"><?= $this->session->flashdata('alert') ?></div>
					<?php endif; ?>
				</div>
				<div class="card">
					
				</div>
			</div>
		</div>
	</section>
</div>
