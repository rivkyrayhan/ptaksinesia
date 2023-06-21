<?php 
    require "controller/database.php";
    $data = mysqli_query($databaseConn, "SELECT * FROM kontak");
    if(isset($_POST["kirim"])){
        date_default_timezone_set('Asia/Jakarta');
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $pesan = $_POST['pesan'];
        $waktu = date('l, d-m-Y H:i:s');
        $insertToDb = mysqli_query($databaseConn, "INSERT INTO tbl_contact VALUES('', '$nama', '$email', '$nohp', '$pesan', '$waktu')");
        if($insertToDb){
            echo "<script type='text/javascript'>alert('Pesan Anda Telah Terkirim'); document.location.href = 'contact.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | PT. AKSINESIA</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo-nav.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style-about.css">
    <link rel="stylesheet" href="assets/css/style-contact.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    <section id="contact-jumbotron">
        <div class="container">
            <div class="title-jumbotron text-center">
                <h1>Hubungi Kami</h1>
                <h5>Jangan ragu untuk menghubungi kami kapanpun.</h5>
                <h5>Kami akan tetap terhubung bersama anda.</h5>
            </div>
        </div>
    </section>
    <section id="menus-contact">
        <div class="container">
            <?php foreach ($data as $dataDbs) : ?>
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card my-card">
                        <div class="icons">
                            <div class="icon-telp"><i class="bi bi-telephone-fill"></i></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Telepon</p>
                            <p class="card-text"><?= $dataDbs["telepon"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card my-card">
                        <div class="icons">
                            <div class="icon-wa"><i class="bi bi-whatsapp"></i></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Whatsapp</p>
                            <p class="card-text"><?= $dataDbs["whatsapp"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="card my-card email">
                        <div class="icons">
                            <div class="icon-mail"><i class="bi bi-envelope-at"></i></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Email</p>
                            <p class="card-text"><?= $dataDbs["email"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section id="maps-form" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-4">
                    <div class="form">
                        <form class="row g-3" method="POST" action="">
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Lengkap:<span style="color: red;">*</span> </label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email:<span style="color: red;">*</span> </label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="nohp" class="form-label">Nomor Telepon:<span style="color: red;">*</span> </label>
                                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="08XXXXXXXXXX">
                            </div>
                            <div class="col-12">
                                <label for="pesan" class="form-label">Pesan:<span style="color: red;">*</span> </label>
                                <textarea name="pesan" id="pesan" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="kirim" class="btn tombol">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.265311001236!2d112.2571343137665!3d-7.546019694557786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786b904e803f2d%3A0x5a1e01015d11300f!2sPusdiklat%20Digital%20Power%2C%20Training%20Center%20Jombang!5e0!3m2!1sid!2sid!4v1673842106336!5m2!1sid!2sid" class="my-maps" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section id="maps-detail" class="pt-5 pb-5">
        <div class="container">
            <h1>PT. APIKIN SDM INDONESIA</h1>
            <?php foreach ($data as $dataDbs) : ?>
            <div class="alamat">
                <!-- <p>Perum Kalangan RT/RW 005/002, Barat Bakso Opo Jare, Area Sawah/Kebun, Keplaksari, Kec. Peterongan, Kabupaten Jombang, Jawa Timur 61481</p> -->
                <p><?= $dataDbs["alamat"]; ?></p>
            </div>
            <?php endforeach; ?>
            <div class="show-maps">
                <a href="https://www.google.co.id/maps/place/Pusdiklat+Digital+Power,+Training+Center+Jombang/@-7.5460197,112.2571343,17z/data=!3m1!4b1!4m5!3m4!1s0x2e786b904e803f2d:0x5a1e01015d11300f!8m2!3d-7.5460197!4d112.259323">Lihat Peta <i class="bi bi-arrow-right-circle fw-bold"> </i></a>
            </div>
        </div>
    </section>

    <?php include 'layouts/footer.php'; ?>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>