<?php
include 'include/db.php';
if (isset($_GET['error'])) {

?>

    <?php
    if ($_GET['error'] == 1) {

    ?>
        <div class="alert alert-warning alert-custom alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-title"></h4>
            <p>Maaf Data sebelumnya sudah dibuat mohon dibuat data baru.</p>
        </div>
<?php
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">Form Tambah Klub</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="np" class="col-sm-3 control-label">Nama Klub</label>
                        <div class="col-sm-8">
                            <input type="text" id="nk" name="klub" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="np" class="col-sm-3 control-label">Nama Kota</label>
                        <div class="col-sm-8">
                            <input type="text" id="kk" name="kota" class="form-control" required="">
                        </div>
                    </div>
            </div>
            <div class="row ">
                <div class="col-sm-8 col-sm-offset-3 m-4">
                    <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Simpan</button> &nbsp;
                    <button onclick="window.location = '?hal=dt_kelas'" class="btn btn-danger" name="batal"><i class="fa fa-trash"></i> Batal</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div><!-- END column -->
</div>
<?php
if (isset($_POST['simpan'])) {
    $klub = $_POST['klub'];
    $kota = $_POST['kota'];

    $sql = mysqli_query($kon, "SELECT * FROM  `klub` WHERE `nama_klub` = '$klub'");
    $cek = mysqli_num_rows($sql);
    if ($cek == 1) {
        echo "<script>window.location = '?hal=klub&error=1';</script>";
    } else {
        $que1 = mysqli_query($kon, "INSERT INTO `klub` (`id`,`nama_klub`,`nama_kota`) VALUE (NULL, '$klub' , '$kota')");
        echo "<script>window.location = '?hal=klub&error=0';</script>";
    }
}

?>