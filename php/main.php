<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/mainpage.css">
</head>
<body>
    <?php
        include_once "nav.php";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['logout_id'])) {
            $update = mysqli_query($conn, "UPDATE felhasznalok SET bevan = 0 WHERE id = {$_SESSION['user']}");
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        }
    }
    ?>
    <?php
    if($ad["szerepkor_id"] == 1){
        $user_query = mysqli_query($conn, "SELECT *, szerepkor.szerep  FROM felhasznalok JOIN szerepkor ON felhasznalok.szerepkor_id = szerepkor.id");
    }else{
        $user_query = mysqli_query($conn, "SELECT felhasznalok.*, szerepkor.szerep FROM felhasznalok JOIN szerepkor ON felhasznalok.szerepkor_id = szerepkor.id WHERE felhasznalok.id = {$_SESSION['user']}");
    }
     ?>
    <div class="home_content">
        <div class="prof_content">
            <h1>Profil</h1>
            <div class="inf">
            <?php
                while($us = mysqli_fetch_assoc($user_query)){
                    echo '
                    <div class="item">
                        <h3>A profil adatai</h3>
                        <table>
                        <tr>
                            <td>Neve:</td>
                            <td>'.$us["nev"].'</td>
                        </tr>
                        <tr>
                            <td>Adószáma:</td>
                            <td>'.$us["adoszam"].'</td>
                        </tr>
                        <tr>
                            <td>Lakhelye:</td>
                            <td>'.$us["lakcim"].'</td>
                        </tr>
                        <tr>
                            <td>Telefonszáma:</td>
                            <td>'.$us["telefon"].'</td>
                        </tr>
                        <tr>
                            <td>Anyja neve:</td>
                            <td>'.$us["szulo"].'</td>
                        </tr>
                        <tr>
                            <td>Születési ideje:</td>
                            <td>'.$us["szul_datum"].'</td>
                        </tr>
                        </table>
                        <a href="profilszerk.php?userid='.$us["id"].'">Szerkeztés</a>
                    </div>  
                    ';
                }
            ?>   
            </div>
        </div>
    </div>
</body>
</html>
