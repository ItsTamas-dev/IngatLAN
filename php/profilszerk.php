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
        $userid = $_GET["userid"];
        $user_query = mysqli_query($conn, "SELECT felhasznalok.*, szerepkor.szerep FROM felhasznalok JOIN szerepkor ON felhasznalok.szerepkor_id = szerepkor.id WHERE felhasznalok.id = {$userid}");
        $us;
        if ($user_query) {
            if(mysqli_num_rows($user_query) > 0){
            $us = mysqli_fetch_assoc($user_query);
            }
        }
    ?>
    <div class="home_content">
        <div class="prof_content">
            <h1>Profil szerkeztés</h1>
            <div class="inf">
                <div class="item">
                    <h3>Adatok szerkeztése</h3>
                    <form action="profilszerk.php?userid=<?php echo $userid?>" method="POST">
                        <table>
                            <tr>
                                <td>Neve:</td>
                                <td><input type="text" name="nev" placeholder="<?php echo $us["nev"]?>"></td>
                            </tr>
                            <tr>
                                <td>Adószáma:</td>
                                <td><input type="number" name="ado" placeholder="<?php echo $us["adoszam"]?>"></td>
                            </tr>
                            <tr>
                                <td>Lakhelye:</td>
                                <td><input type="text" name="lakhely" placeholder="<?php echo $us["lakcim"]?>"></td>
                            </tr>
                            <tr>
                                <td>Telefonszáma:</td>
                                <td><input type="text" name="tel" placeholder="<?php echo $us["telefon"]?>"></td>
                            </tr>
                            <tr>
                                <td>Anyja neve:</td>
                                <td><input type="text" name="szul" placeholder="<?php echo $us["szulo"]?>"></td>
                            </tr>
                            <tr>
                                <td>Születési ideje:</td>
                                <td><input type="text" name="date" placeholder="<?php echo $us["szul_datum"]?>"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Mentés" name="saveprof">
                    </form>
                </div>
                <div class="item">
                    <h3>A jelszó szerkeztése</h3>
                    <form action="profilszerk?userid=<?php echo $userid?>" method="POST">
                        <table>
                            <tr>
                                <td>Régi jelszó</td>
                                <td><input type="text" name="old"></td>
                            </tr>
                            <tr>
                                <td>Új jelszó:</td>
                                <td><input type="text" name="new"></td>
                            </tr>
                            <tr>
                                <td>Új jelszó újra:</td>
                                <td><input type="text" name="newre"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Mentés" name="changepass">
                    </form>
                </div>       
            </div>
        </div>
        
    </div>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['saveprof'])) {
            update_user($userid, $conn, $us);
        }
        if (isset($_POST['changepass'])) {
            changePass($userid, $conn, $us);
        }
        
    }
?>