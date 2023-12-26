<?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name =  generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '' || $harga == '') {
            ?>
                    <div class="alert alert-warning  mt-3" role="alert">
                        nama, kategori dan harga wajib di isi!
                    </div>
                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 5000000) {
                    ?>
                            <div class="alert alert-warning  mt-3" role="alert">
                                File Max 5MB
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'svg' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning  mt-3" role="alert">
                                    Hanya jpg, png, svg dan gif saja!
                                </div>
                        <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file . $new_name);
                            }
                        }
                    }


                    //query untuk insert ini kimak peeppk...
                    $queryTambah = mysqli_query($con, "INSERT INTO menu (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok')");

                    if ($queryTambah) {
                        ?>
                        <div class="alert alert-warning  mt-3" role="alert">
                            Produk Berhasil Tesimpan
                        </div>

                        <meta http-equiv="refresh" content="2; url=menu.php">
            <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            ?>