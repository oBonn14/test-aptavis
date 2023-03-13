<?php
if ($_GET['hal'] == 'main') {
	$title = "Halaman Utama";
	$menu = "Dashboard";
	function Bo($asw)
	{
		if ($asw == 'head') {
?>

		<?php
		}
		if ($asw == 'isi') {
			include 'main.php';
		}
		if ($asw == 'foot') {
		?>

		<?php
		}
	}
}

#petugas
if ($_GET['hal'] == 'ptgs') {
	$title = "Halaman Petugas";
	$menu = "Data Petugas";
	function Bo($asw)
	{
		if ($asw == 'head') {
		?>
			<!-- Data Tables -->
			<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
			<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

		<?php
		}
		if ($asw == 'isi') {
			include 'petugas/dt_petugas.php';
		}
		if ($asw == 'foot') {
		?>
			<!-- Data Tables -->
			<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
			<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
			<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
			<script src="assets/scripts/datatables.demo.min.js"></script>
		<?php
		}
	}
}
if ($_GET['hal'] == 'klub') {
	$title = "Halaman Klub";
	$menu = "Tambah Klub";
	function Bo($asw)
	{
		if ($asw == 'head') {
		?>

		<?php
		}
		if ($asw == 'isi') {
			include 'klub.php';
		}
		if ($asw == 'foot') {
		?>

		<?php
		}
	}
}
if ($_GET['hal'] == 'klasemen') {
	$title = "Halaman Klasemen";
	$menu = "Tambah Klasemen";
	function Bo($asw)
	{
		if ($asw == 'head') {
		?>

		<?php
		}
		if ($asw == 'isi') {
			include 'score.php';
		}
		if ($asw == 'foot') {
		?>

		<?php
		}
	}
}
#kelas
if ($_GET['hal'] == 'update_score') {
	$title = "Halaman Update Score";
	$menu = "Data Update Score";
	function Bo($asw)
	{
		if ($asw == 'head') {
		?>

		<?php
		}
		if ($asw == 'isi') {
			include 'upd_score.php';
		}
		if ($asw == 'foot') {
		?>

<?php
		}
	}
}

?>