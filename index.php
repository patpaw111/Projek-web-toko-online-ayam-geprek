<?php
    require "koneksi.php";
    $queryMenu = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM menu LIMIT 6")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Muzaki | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    .tbtb {
        margin-top: 100px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex">
        <div class="container d-flex">
            <div class="container tbtb">
                <h1>Ayam Geprek Muzaki</h1>
                <h3>Cari Disini !</h3>
                <div class="my-5 col-12 text-white">
                    <form action="menu.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Menu Disini" aria-label="Username penerima" aria-describedby="basic-addon2" name="keyword">
                            <button type="submit" class="btn" style="background-color: #E22124;">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="F-ayam d-flex justify-content-center align-items-center d-none d-md-block">
                <!-- Kelas 'd-none d-md-block' akan menyembunyikan elemen ini pada layar kecil -->
                <img src="asset/foto ayam.png" alt="">
            </div>
        </div>
    </div>


    <div class="container-fluid py-5 MPler">
        <div class="container text-center">
            <h3>Menu Teropuler</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <p>Ayam Geprek Presto</p>
                    <div class="highlighted-menu ayam-g"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <p>Mie Indomie Ayam Geprek</p>
                    <div class="highlighted-menu mie-geprek"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <p>Es Teh</p>
                    <div class="highlighted-menu wedang-J"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 warnaP">
        <div class="container T-T">
            <div class="clearfix">
                <img src="asset/logo ayam geprek.png" class="col-md-6 float-md-end mb-3 ms-md-3 Gambar-T" alt="">
                <div class="container">
                    <h3>Tentang Kami</h3>
                    <p>"Selamat datang di Ayam Geprek Muzaki! Kami adalah warung yang menghadirkan pengalaman kuliner unik dengan menu andalan, Ayam Geprek. Dengan dedikasi tinggi dalam menyajikan hidangan berkualitas, kami memadukan rempah-rempah pilihan dan teknik memasak terbaik untuk menciptakan cita rasa yang memanjakan lidah. Berkomitmen untuk memberikan layanan terbaik, Ayam Geprek Lezat menjadi destinasi favorit pencinta kuliner yang mencari sensasi kelezatan dan kehangatan dalam setiap gigitan. Selamat datang dan nikmati kelezatan kami yang tak tertandingi!"</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 randomMenu">
        <div class="container text-center">
            <h3>Highlight Menu</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryMenu)){?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top custom-img mt-3" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-truncate"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                            <a href="menu-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-danger">Cek Menu</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <a href="menu.php" class="btn btn-outline-danger tombol-s">See More</a>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>