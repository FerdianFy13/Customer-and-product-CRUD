<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require "../head.php";
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="javascript:void(0)">DTS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <?php
if (isset($_SESSION['user'])) {
    ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../produk/index.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pelanggan/index.php">Pelanggan</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <a class="nav-link active" href="#"><?=$_SESSION["user"]?>,</a>
                <a class="nav-link active" href="../logout.php">Logout</a>
            </ul>
            <?php
}
?>
        </div>
    </nav>
    <?php

// mengambil data produk dengan id=..
require "../db_con.php";
$id = test_input($_GET["id"]);
$query = "SELECT * FROM produk WHERE id='$id'";
$hasil = mysqli_query($db, $query);
$produk = mysqli_fetch_assoc($hasil);
// print_r($produk);
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">
                <h2>Tambah Produk</h2>
                <div class="bd-example">
                    <form action="update.php" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Merek</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?=$produk['id']?>">
                                <input type="text" class="form-control" name="merek" placeholder="Merek"
                                    value="<?=$produk['merek']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" placeholder="Type"
                                    value="<?=$produk['type']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"
                                    value="<?=$produk['deskripsi']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="d-sm-none">
            </div>
        </div>
    </div>

    <div class="jumbotron text-center bg-light" style="margin-bottom:0">
        <h4><a href="https://github.com/FerdianFy13" class="text-decoration-none text-danger">Ferdian Firmansyah</a>
        </h4>
    </div>

</body>

</html>