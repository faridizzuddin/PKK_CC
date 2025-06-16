<?php
?>
<ul id="sidebarnav">
	<!--<li class="header">MAIN NAVIGATION</li> -->
	<!--
			<li>
			  <a href="<?= base_url() ?>index.php/k1/index/">
				<i class="fa fa-th"></i> <span>Padan Calon EF</span> <small class="label pull-right bg-green">new</small>
			  </a>
			</li> -->

	<li class="sidebar-item">
		<!-- <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
			<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
			<span class="hide-menu">Sample Pages</span>
		</a> -->


		<?php
		echo "Role : " . $_SESSION['role'];
		?>

		<?php if (!empty($_SESSION['icno'])) { ?>
			<a href="https://mynemov3.umt.edu.my/mynemov3/mainpage/main" class="sidebar-link">
				<i class="ti ti-corner-up-left-double"></i>
				<span class="hide-menu">Kembali ke MyNemo</span>
			</a>
			<a href="<?= base_url() ?>sip/pelajar/carian" class="sidebar-link">
				<i class="ti ti-search"></i>
				<span class="hide-menu">Carian Pelajar</span>
			</a>
			<!-- ---------------------------------- -->
			<!-- Menu Setup -->
			<!-- ---------------------------------- -->




			<!-- Untuk module PKK -->
		<li class="sidebar-item text-center fw-bolder">UNTUK DEVELOPER</li>

		<li class="sidebar-item">
			<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
				<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
				<span class="hide-menu">Permohonan</span>
			</a>
			<ul aria-expanded="false" class="collapse first-level">
				<li class="sidebar-item">
					<a href="<?= base_url() ?>pemohon/permohonan/form_program/<?= $_SESSION["UID"] ?>" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Permohonan Baru</span>
					</a>
				</li>

				<li class="sidebar-item">
					<a href="<?= base_url() ?>pemohon/permohonan/view_program" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Senarai Permohonan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>setup/ccc/setup_dekan" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Sejarah Permohonan</span>
					</a>
				</li>
			</ul>
		</li>

		<li class="sidebar-item">
			<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
				<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
				<span class="hide-menu">Super Admin</span>
			</a>

			<ul aria-expanded="false" class="collapse first-level">
				<li class="sidebar-item">
					<a href="<?= base_url() ?>adminpkk/permohonan/view_program" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Semua Permohonan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>adminpkk/perkhidmatan/form_perkhidmatan" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Tambah Perkhidmatan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>adminpkk/perkhidmatan/senarai_perkhidmatan" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Senarai Perkhidmatan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>adminpkk/cenderamata/form_cenderamata" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Tambah Cenderamata</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>adminpkk/cenderamata/senarai_cenderamata" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Senarai Cenderamata</span>
					</a>
				</li>
			</ul>
		</li>

		<li class="sidebar-item">
			<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
				<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
				<span class="hide-menu">Section Admin - Approval</span>
			</a>

			<ul aria-expanded="false" class="collapse first-level">
				<li class="sidebar-item">
					<a href="<?= base_url() ?>sectionadmin/section_admin/section_ppm" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Protokol dan Pengurusan Majlis</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>sectionadmin/section_admin/section_pk" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Pentadbiran dan Kewangan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>sectionadmin/section_admin/section_pc" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Promosi dan Citra</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>sectionadmin/section_admin/section_pkm" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Perhubungan Korporat dan Media</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>sectionadmin/section_admin/section_mk" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Media Kreatif</span>
					</a>
				</li>
			</ul>
		</li>




		<li class="sidebar-item text-center fw-bolder">SELEPAS AUTHORIZATION</li>
		<li class="sidebar-item">
			<a href="<?= base_url() ?>pemohon/permohonan/form_program" class="sidebar-link">
				<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
				<span class="hide-menu">Permohonan Baru</span>
			</a>
		</li>

		<li class="sidebar-item">
			<a href="<?= base_url() ?>pemohon/permohonan/view_program" class="sidebar-link">
				<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
				<span class="hide-menu">Senarai Permohonan</span>
			</a>
		</li>


		<?php if ($_SESSION['role'] == 'admin_ppm') { ?>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sectionadmin/section_admin/section_ppm" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Pengesahan</span>
				</a>
			</li>
		<?php } ?>


		<?php if ($_SESSION['role'] == 'admin_mk') { ?>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sectionadmin/section_admin/section_mk" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Pengesahan</span>
				</a>
			</li>
		<?php } ?>

		<?php if ($_SESSION['role'] == 'admin_pkm') { ?>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sectionadmin/section_admin/section_pkm" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Pengesahan</span>
				</a>
			</li>
		<?php } ?>

		<?php if ($_SESSION['role'] == 'admin_pc') { ?>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sectionadmin/section_admin/section_pkm" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Pengesahan</span>
				</a>
			</li>
		<?php } ?>

		<?php if ($_SESSION['role'] == 'super_admin') { ?>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>adminpkk/permohonan/view_program" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Pengesahan Permohonan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>adminpkk/perkhidmatan/form_perkhidmatan" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Tambah Perkhidmatan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>adminpkk/perkhidmatan/senarai_perkhidmatan" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Senarai Perkhidmatan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>adminpkk/cenderamata/form_cenderamata" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Tambah Cenderamata</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>adminpkk/cenderamata/senarai_cenderamata" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Senarai Cenderamata</span>
				</a>
			</li>
		<?php } ?>


		<?php if ($_SESSION['role'] == 'guest') { ?>


		<?php } ?>







		<!-- <li class="sidebar-item">
			<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
				<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
				<span class="hide-menu">Admin</span>
			</a>
			<ul aria-expanded="false" class="collapse first-level">
				<li class="sidebar-item">
					<a href="<?= base_url() ?>admin/ccc/index" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Proses Bench Fee</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>admin/ccc/baki" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Senarai Bench Fee</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>admin/ccc/xaktif" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Pool Tak Aktif</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>admin/ccc/txpool" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Transaksi Pool</span>
					</a>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>admin/ccc/statfak" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Statistik Benchfee Fakulti</span>
					</a>
				</li>
			</ul>
		</li>


		<li class="sidebar-item">
			<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
				<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
				<span class="hide-menu">Keluar Kampus</span>
			</a>
			<ul aria-expanded="false" class="collapse first-level">
				<li class="sidebar-item">
					<a href="<?= base_url() ?>pelajar/ccc/listmohon" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Senarai Permohonan</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a href="<?= base_url() ?>pelajar/ccc/mohon" class="sidebar-link">
						<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
						<span class="hide-menu">Mohon Keluar Kampus</span>
					</a>
				</li>


			</ul>
		</li>



	<?php } ?>
	<li class="sidebar-item">
		<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
			<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
			<span class="hide-menu">Penyelia</span>
		</a>
		<ul aria-expanded="false" class="collapse first-level">
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sv/ccc/listmohon" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Senarai Permohonan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>sv/tunt/listmohon_all" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Rekod Permohonan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>outcampus/ccc/listmohon" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Permohonan Outcampus</span>
				</a>
			</li>

		</ul>
	</li>

	<li class="sidebar-item">
		<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
			<iconify-icon icon="solar:document-linear" class="aside-icon"></iconify-icon>
			<span class="hide-menu">Pembayaran</span>
		</a>
		<ul aria-expanded="false" class="collapse first-level">
			<li class="sidebar-item">
				<a href="<?= base_url() ?>spayment/ccc/listmohon" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Senarai Permohonan</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="<?= base_url() ?>spayment/tunt/listmohon_all" class="sidebar-link">
					<iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
					<span class="hide-menu">Rekod Permohonan</span>
				</a>
			</li>


		</ul>
	</li>
	</li>
</ul> -->