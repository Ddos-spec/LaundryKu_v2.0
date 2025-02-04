<nav class="uk-navbar-container uk-navbar-primary uk-light" uk-navbar>
    <div class="uk-navbar-left">
        <a href="index.php" class="uk-navbar-item uk-logo"><i class="uk-icon-button uk-icon" uk-icon="home"></i> Pelakor</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li>
                <?php
                    global $connect;

                    if ( isset($_SESSION["login-pelanggan"]) && isset($_SESSION["pelanggan"])){
                        $idPelanggan = $_SESSION["pelanggan"];
                        $data = mysqli_query($connect, "SELECT * FROM pelanggan WHERE id_pelanggan = '$idPelanggan'");
                        $data = mysqli_fetch_assoc($data);
                        $nama = $data["nama"];

                        echo "<a href='pelanggan.php'><b>$nama</b> (Pelanggan)</a>";
                    } else if ( isset($_SESSION["login-agen"]) && isset($_SESSION["agen"])){
                        $id_agen = $_SESSION["agen"];
                        $data = mysqli_query($connect, "SELECT * FROM agen WHERE id_agen = '$id_agen'");
                        $data = mysqli_fetch_assoc($data);
                        $nama = $data["nama_laundry"];

                        echo "<a href='agen.php'><b>$nama</b> (Agen)</a>";
                    } else if ( isset($_SESSION["login-admin"]) && isset($_SESSION["admin"])){
                        echo "<a href='admin.php'><b>Admin</b> (Admin)</a>";
                    } else {
                        echo "<a href='registrasi.php'><b>Registrasi</b></a>";
                    }
                ?>
            </li>
            <li>
                <?php
                    if ( isset($_SESSION["login-pelanggan"]) && isset($_SESSION["pelanggan"]) || isset($_SESSION["login-agen"]) && isset($_SESSION["agen"]) || isset($_SESSION["login-admin"]) && isset($_SESSION["admin"])){
                        echo "<a href='logout.php'><b>Logout</b></a>";
                    } else {
                        echo "<a href='login.php'><b>Login</b></a>";
                    }
                ?>
            </li>
        </ul>
    </div>
</nav>