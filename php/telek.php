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
        $tel_query;
        if($ad["szerepkor_id"] == 1){
            $tel_query = mysqli_query($conn, "SELECT telkek.*, tulajdonosok.tulajdon, telek_jelleg.jelleg FROM felhasznalok JOIN tulajdonosok ON felhasznalok.adoszam = tulajdonosok.adoszam JOIN telkek ON tulajdonosok.helyrajz = telkek.helyrajz JOIN telek_jelleg ON telkek.jelleg_id = telek_jelleg.id");
        }else{
            $tel_query = mysqli_query($conn, "SELECT telkek.*, tulajdonosok.tulajdon, telek_jelleg.jelleg FROM felhasznalok JOIN tulajdonosok ON felhasznalok.adoszam = tulajdonosok.adoszam JOIN telkek ON tulajdonosok.helyrajz = telkek.helyrajz JOIN telek_jelleg ON telkek.jelleg_id = telek_jelleg.id WHERE felhasznalok.id = {$_SESSION['user']}");
        }
    ?>
    <div class="home_content">
        <div class="tel_content">
            <h1>Telkek</h1>
            <div class="inf">
                <?php
                    while($tel = mysqli_fetch_assoc($tel_query)){
                        echo '
                            <div class="item">
                                <h3>A telek tulajdonságai</h3>
                                <table>
                                    <tr>
                                        <td>Helyrajz:</td>
                                        <td>'.$tel["helyrajz"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Méret:</td>
                                        <td>'.$tel["meret"].' m<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td>Érték:</td>
                                        <td>'.$tel["ertek"].' Ft</td>
                                    </tr>
                                    <tr>
                                        <td>Jellege:</td>
                                        <td>'.$tel["jelleg"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Tulajdon:</td>
                                        <td>'.$tel["tulajdon"].'%</td>
                                    </tr>
                                </table>
                                <a href="telekszerk.php?telid='.$tel["id"].'">Szerkeztés</a>
                            </div>
                        ';
                    }
                ?>              
            </div>
        </div>
    </div>
</body>
</html>