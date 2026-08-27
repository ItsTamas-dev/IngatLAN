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
        $ing_query;
        if($ad["szerepkor_id"] == 1){
            $ing_query = mysqli_query($conn, "SELECT ingatlanok.*, tulajdonosok.tulajdon, ingatlan_jelleg.jelleg FROM felhasznalok JOIN tulajdonosok ON felhasznalok.adoszam = tulajdonosok.adoszam JOIN ingatlanok ON tulajdonosok.ingatlan = ingatlanok.id JOIN ingatlan_jelleg ON ingatlanok.jelleg_id = ingatlan_jelleg.id");
        }else{
            $ing_query = mysqli_query($conn, "SELECT ingatlanok.*, tulajdonosok.tulajdon, ingatlan_jelleg.jelleg FROM felhasznalok JOIN tulajdonosok ON felhasznalok.adoszam = tulajdonosok.adoszam JOIN ingatlanok ON tulajdonosok.ingatlan = ingatlanok.id JOIN ingatlan_jelleg ON ingatlanok.jelleg_id = ingatlan_jelleg.id WHERE felhasznalok.id = {$_SESSION['user']}");
        }
        
    ?>
    <div class="home_content">
        <div class="ing_content">
            <h1>Ingatlanok</h1>
            <div class="inf">
                <?php
                    while($ing = mysqli_fetch_assoc($ing_query)){
                        echo '
                            <div class="item">
                                <h3>Az ingatlan tulajdonságai</h3>
                                <table>
                                    <tr>
                                        <td>Építési év</td>
                                        <td>'.$ing["epites"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Irányítószám:</td>
                                        <td>'.$ing["ir_szam"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Telepules:</td>
                                        <td>'.$ing["telepules"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Kerület:</td>
                                        <td>'.$ing["kozterulet"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Érték:</td>
                                        <td>'.$ing["ertek"].' Ft</td>
                                    </tr>
                                    <tr>
                                        <td>Jellege:</td>
                                        <td>'.$ing["jelleg"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Tulajdon:</td>
                                        <td>'.$ing["tulajdon"].'%</td>
                                    </tr>
                                </table>
                                <a href="ingatlanszerk.php?ingid='.$ing["id"].'">Szerkeztés</a>
                            </div>
                        ';
                    }
                ?>              
            </div>
        </div>
    </div>
</body>
</html>