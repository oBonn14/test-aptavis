<?php
include 'include/db.php';
$tg = date('Y-m-d');
if (isset($_GET['error'])) {

?>

	<?php
	if ($_GET['error'] == 0) {

	?>
		<div class="alert alert-success alert-custom alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="alert-title">Success</h4>
			<p>Upload Data Berhasil</p>
		</div>
<?php
	}
}
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title">Klasemen Bola</h4>

			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<button type="button" class="btn btn-outline mw-md rounded btn-primary btn-xs" onclick="window.location='?hal=update_score'">Update Score</button>
				<div class="widget-body">
					<div class="table-responsive">
						<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Klub</th>
									<th>Main</th>
									<th>Menang</th>
									<th>Seri</th>
									<th>Kalah</th>
									<th>Goal Menang</th>
									<th>Goal Kalah</th>
									<th>Point</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama Klub</th>
									<th>Main</th>
									<th>Menang</th>
									<th>Seri</th>
									<th>Kalah</th>
									<th>Goal Menang</th>
									<th>Goal Kalah</th>
									<th>Point</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								$no = 1;
								$sql = "SELECT * FROM `score` ORDER BY `point` DESC ";
								$que = mysqli_query($kon, $sql);
								while ($dt = mysqli_fetch_assoc($que)) {
									$id = $dt['id'];
								?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php
											$klub = mysqli_query($kon, "SELECT * FROM `klub` WHERE `id` = '$id'");
											$nm = mysqli_fetch_assoc($klub);
											echo $nm['nama_klub']; ?>
										</td>
										<td><?php echo $dt['main'] ?></td>
										<td><?php echo $dt['menang'] ?></td>
										<td><?php echo $dt['seri'] ?></td>
										<td><?php echo $dt['kalah'] ?></td>
										<td><?php echo $dt['goal_menang'] ?></td>
										<td><?php echo $dt['goal_kalah'] ?></td>
										<td><?php echo $dt['point'] ?></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	// if (isset($_GET['delid'])) {
	// 	$id = $_GET['delid'];

	// 	$que5 = mysqli_query($kon, "DELETE FROM `kelas` WHERE `id_kelas` = $id");
	// 	if ($que5) {
	// 		echo "<script>window.location = '?hal=kelas&error=0';</script>";
	// 	} else {
	// 		echo "<script>window.location = '?hal=kelas&error=1';</script>";
	// 	}
	// }
	?>