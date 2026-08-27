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
        $ingid = $_GET["ingid"];
        $ing_query = mysqli_query($conn, "SELECT * FROM ingatlanok WHERE id = {$ingid}");
        $ing;
        if ($ing_query) {
            if(mysqli_num_rows($ing_query) > 0){
            $ing = mysqli_fetch_assoc($ing_query);
            }
        }
    ?>
    <div class="home_content">
        <div class="prof_content">
            <h1>Ingatlan szerkeztés</h1>
            <div class="inf">
                <div class="item">
                    <h3>Adatok szerkeztése</h3>
                    <form action="ingatlanszerk.php?ingid=<?php echo $ingid?>" method="POST">
                    <table>
                        <tr>
                            <td>Építési év</td>
                            <td><input type="text" name="ev" placeholder="<?php echo $ing["epites"]?>"></td>
                        </tr>
                        <tr>
                            <td>Irányítószám:</td>
                            <td><input type="number" name="irszam" placeholder="<?php echo $ing["ir_szam"]?>"></td>
                        </tr>
                        <tr>
                            <td>Telepules:</td>
                            <td><input type="text" name="telepules" placeholder="<?php echo $ing["telepules"]?>"></td>
                        </tr>
                        <tr>
                            <td>Kerület:</td>
                            <td><input type="text" name="kerulet" placeholder="<?php echo $ing["kozterulet"]?>"></td>
                        </tr>
                        <tr>
                            <td>Érték:</td>
                            <td><input type="number" name="ertek" placeholder="<?php echo $ing["ertek"]?>"></td>
                        </tr>
                    </table>
                    <input type="submit" value="Mentés" name="saveing">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['saveing'])) {
            update_ingatlan($ingid, $conn, $ing);
        }
        
    }
?>