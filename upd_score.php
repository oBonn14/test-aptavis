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
        </div>
<?php
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">Form Update Score</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="klub_1" class="col-sm-3 control-label">Nama Klub 1</label>
                        <div class="col-sm-4">
                            <select type="text" id="klub_1" name="klub_1" class="form-control" required="">
                                <option></option>
                                <?php
                                $sql2 = "SELECT * FROM `klub`";
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
                                $sql2 = "SELECT * FROM `klub`";
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

    $sql = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_1' OR `id_klub` = '$klub_2'");
    $cek = mysqli_num_rows($sql);

    if ($cek) {

        if ($score_1 == $score_2) {

            $sql1 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_1'");
            $que1 = mysqli_fetch_assoc($sql1);

            $main1 = 1 + $que1['main'];
            $seri1 = 1 + $que1['seri'];
            $pointSeri1 = 1 + $que1['point'];

            mysqli_query($kon, "UPDATE `score` SET `main` = '$main1' , `seri` ='$seri1',`point` = '$pointSeri1' WHERE `id_klub` = '$klub_1'");

            $sql2 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_2'");
            $que2 = mysqli_fetch_assoc($sql2);

            $main2 = 1 + $que2['main'];
            $seri2 = 1 + $que2['seri'];
            $pointSeri2 = 1 + $que2['point'];
            mysqli_query($kon, "UPDATE `score` SET `main` = '$main2' , `seri` ='$seri2',`point` = '$pointSeri2' WHERE `id_klub` = '$klub_2'");

            echo "<script>window.location = '?hal=main&error=0';</script>";
        } elseif ($score_1 >= $score_2) {

            $sql1 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_1'");
            $que1 = mysqli_fetch_assoc($sql1);

            $main1 = 1 + $que1['main'];
            $menang1 = 1 + $que1['menang'];
            $pointMenang1 = 3 + $que1['point'];
            $goal_menang1 = $score_1 + $que1['goal_menang'];

            mysqli_query($kon, "UPDATE `score` SET `main` = '$main1', `menang` = '$menang1' , `goal_menang` = '$goal_menang1' , `point` = '$pointMenang1' WHERE `id_klub` = '$klub_1'");

            $sql2 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_2'");
            $que2 = mysqli_fetch_assoc($sql2);

            $main2 = 1 + $que2['main'];
            $kalah2 = 1 + $que2['kalah'];
            $goal_kalah2 = $score_2 + $que2['goal_kalah'];

            mysqli_query($kon, "UPDATE `score` SET `main` = '$main2', `kalah` = '$kalah2' , `goal_kalah` = '$goal_kalah2' WHERE `id_klub` = '$klub_2'");


            echo "<script>window.location = '?hal=main&error=0';</script>";
        } elseif ($score_2 >= $score_1) {

            $sql1 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_1'");
            $que1 = mysqli_fetch_assoc($sql1);

            $main1 = 1 + $que1['main'];
            $kalah1 = 1 + $que1['kalah'];
            $goal_kalah1 = $score_1 + $que1['goal_kalah'];
            mysqli_query($kon, "UPDATE `score` SET `main` = '$main1', `kalah` = '$kalah1' , `goal_kalah` = '$goal_kalah1'  WHERE `id_klub` = '$klub_1'");

            $sql2 = mysqli_query($kon, "SELECT * FROM `score` WHERE `id_klub` = '$klub_2'");
            $que2 = mysqli_fetch_assoc($sql2);

            $main2 = 1 + $que2['main'];
            $menang2 = 1 + $que2['menang'];
            $pointMenang2 = 3 + $que2['point'];
            $goal_menang2 = $score_2 + $que2['goal_menang'];

            mysqli_query($kon, "UPDATE `score` SET `main` = '$main2', `menang` = '$manang2' , `goal_menang` = '$goal_menang2' `point` = '$point_menang2' WHERE `id_klub` = '$klub_2'");
            echo "<script>window.location = '?hal=main&error=0';</script>";
        } else {
            echo "<script>window.location = '?hal=score&error=data_gagal_upload';</script>";
        }
    } else {
        echo 'data klasemen tidak di temukan harap untuk menambah kan data dulu di score';
    }
}

?>