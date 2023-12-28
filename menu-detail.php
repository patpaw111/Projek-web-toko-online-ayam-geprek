<?php
    require "koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryMenu = mysqli_query($con, "SELECT * FROM menu WHERE nama='$nama'");
    $menu = mysqli_fetch_array($queryMenu);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Muzaki | Detail Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php" ?>

    <div class="conatiner-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 f-detail mb-5">
                    <img src="image/<?php echo $menu['foto']; ?>" alt="">
                </div>
                <div class="col-md-6 offset-md-1 text-white">
                    <h1><?php echo $menu['nama']; ?></h1>
                    <p class="fs-5"><?php echo $menu['detail']; ?></p>
                    <p class="fs-3">Rp <?php echo $menu['harga']; ?></p>
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $menu['ketersediaan_stok']; ?></strong></p>
                    <a href="https://wa.link/as8qcm" class="btn btn-warning">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>