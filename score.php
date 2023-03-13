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
            <h4 class="alert-title">Terjadi Kesalahan</h4>
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
                <h4 class="panel-title">Form Tambah Score</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="klub_1" class="col-sm-3 control-label">Nama Klub 1</label>
                        <div class="col-sm-4">
                            <select type="text" id="klub_1" name="klub_1" class="form-control" required="">
                                <option></option>
                                <?php
                                $sql2 = "SELECT * FROM `klub`  ;";
                                $que2 = mysqli_query($kon, $sql2);
                                while ($dta2 = mysqli_fetch_assoc($que2)) {
                                    echo '<option value="' . $dta2['id'] . '"> ' . $dta2['nama_klub'] . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="score_1" class="form-control" placeholder="Score" required="">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label for="" class="col-sm-7 control-label">VS</label>
                    </div>
                    <div class="form-group">
                        <label for="klub_2" class="col-sm-3 control-label">Nama Klub 2</label>
                        <div class="col-sm-4">
                            <select type="text" id="klub_2" name="klub_2" class="form-control" required="">
                                <option></option>
                                <?php
                                $sql2 = "SELECT * FROM `klub`  ;";
                                $que2 = mysqli_query($kon, $sql2);
                                while ($dta2 = mysqli_fetch_assoc($que2)) {
                                    echo '<option value="' . $dta2['id'] . '"> ' . $dta2['nama_klub'] . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="score_2" class="form-control" placeholder="Score" required="">
                        </div>
                    </div><!-- .form-group -->
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
    $klub_1 = $_POST['klub_1'];
    $klub_2 = $_POST['klub_2'];
    $score_1 = $_POST['score_1'];
    $score_2 = $_POST['score_2'];

    $main = 1;
    $menang = 1;
    $seri = 1;
    $kalah = 1;
    $pointMenang = 3;
    $pointSeri = 1;
    $pointKalah = 0;

    $sql = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` ='$klub_1' OR `id_klub` = '$klub_2'");
    $cek = mysqli_num_rows($sql);

    if ($cek) {
        echo "<script>window.location = '?hal=klasemen&error=1';</script>";
    } else {
        if ($score_1 == $score_2) {
            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_1','$main','0','$seri','0','0','0','$pointSeri')");

            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_2','$main','0','$seri','0','0','0','$pointSeri')");

            echo "<script>window.location = '?hal=score&error=0';</script>";
        } elseif ($score_1 >= $score_2) {
            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_1','$main','$menang','0','0','$score_1','0','$pointMenang')");

            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_2','$main','0','0','$kalah','0','$score_2','$pointKalah')");

            echo "<script>window.location = '?hal=score&error=0';</script>";
        } elseif ($score_2 >= $score_1) {
            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_1','$main','0','0','$kalah','0','$score_1','$pointKelah')");

            mysqli_query($kon, "INSERT INTO `score` (`id`,`id_klub`,`main`,`menang`,`seri`,`kalah`,`goal_menang`,`goal_kalah`,`point`) VALUE (NULL , '$klub_2','$main','$menang','0','0','$score_2','0','$pointMenang')");
            echo "<script>window.location = '?hal=score&error=0';</script>";
        } else {
            echo "<script>window.location = '?hal=klasemen&error=1';</script>";
        }
    }
}

?>