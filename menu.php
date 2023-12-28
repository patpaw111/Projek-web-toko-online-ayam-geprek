<?php
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $queryMenu = mysqli_query($con, "SELECT * FROM menu WHERE nama LIKE '%$_GET[keyword]%'");
} else if(isset($_GET['kategori'])){
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    if ($kategoriId) {
        // Jika ID kategori ditemukan, ambil menu sesuai dengan ID kategori
        $queryMenu = mysqli_query($con, "SELECT * FROM menu WHERE kategori_id = $kategoriId[0]");
    } else {
        // Jika ID kategori tidak ditemukan, set $queryMenu menjadi null atau query kosong sesuai kebutuhan
        $queryMenu = null;
    }
} else {
    $queryMenu = mysqli_query($con, "SELECT * FROM menu");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Muzaki | Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body menu-l>
    <?php require "navbar.php" ?>

    <div class="container-fluid banner-menu d-flex align-items-center">
        <div class="container">
            <h1 class="text-center">List Menu</h1>
        </div>
    </div>

    <div class="container py-5 isi-l">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a href="menu.php?kategori=<?php echo $kategori['nama']; ?>">
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row">
                <?php while ($menu = ($queryMenu ? mysqli_fetch_array($queryMenu) : null)) { ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="image/<?php echo $menu['foto']; ?>" class="card-img-top custom-img mt-3" alt="...">
            <div class="card-body">
                <h4 class="card-title text-truncate"><?php echo $menu['nama']; ?></h4>
                <p class="card-text text-truncate"><?php echo $menu['detail']; ?></p>
                <p class="card-text text-harga">Rp <?php echo $menu['harga']; ?></p>
                <a href="menu-detail.php?nama=<?php echo $menu['nama']; ?>" class="btn btn-danger">Lihat Menu</a>
            </div>
        </div>
    </div>
<?php } ?>
                </div>
            </div>
        </div>
    </div>


    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>