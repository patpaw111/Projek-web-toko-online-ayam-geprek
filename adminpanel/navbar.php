<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <button class="navbar-toggler offcanvas-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse offcanvas-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link" href="../adminpanel">Home</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link me-3" href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link me-3" href="produk.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    @media (max-width: 992px) {
        body.no-scroll {
            overflow: hidden;
        }

        .navbar-collapse {
            position: fixed;
            top: 0;
            left: -50%; /* Setengah layar */
            width: 50%; /* Setengah layar */
            height: 100%;
            background: #343a40;
            transition: left 0.3s ease;
            z-index: 1000;
            padding-top: 56px; /* Sesuaikan dengan tinggi navbar */
        }

        .navbar-nav {
            margin-top: 5px; /* Jarak 5px pada tulisan */
        }

        .navbar-nav .nav-link {
            margin-left: 5px; /* Tambahkan margin kiri 5px pada tombol navigasi */
            transition: background-color 0.3s ease; /* Efek transisi warna latar belakang saat hover */
        }

        .navbar-nav .nav-link:hover {
            background-color: #dc3545; /* Warna merah yang sama saat hover */
            color: #fff; /* Warna teks saat hover */
        }

        .navbar-collapse.show {
            left: 0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var navbarToggle = document.querySelector('.offcanvas-toggler');
        var navbarCollapse = document.querySelector('.offcanvas-collapse');
        var body = document.querySelector('body');

        navbarToggle.addEventListener('click', function () {
            navbarCollapse.classList.toggle('show');
            body.classList.toggle('no-scroll');
        });

        // Menutup navbar saat mengklik di luar navbar
        document.addEventListener('click', function (e) {
            if (!navbarCollapse.contains(e.target) && !navbarToggle.contains(e.target)) {
                navbarCollapse.classList.remove('show');
                body.classList.remove('no-scroll');
            }
        });
    });
</script>
