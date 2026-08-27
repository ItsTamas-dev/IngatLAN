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
        $telid = $_GET["telid"];
        $tel_query = mysqli_query($conn, "SELECT * FROM telkek WHERE id = {$telid}");
        $tel;
        if ($tel_query) {
            if(mysqli_num_rows($tel_query) > 0){
            $tel = mysqli_fetch_assoc($tel_query);
            }
        }
    ?>
    <div class="home_content">
        <div class="prof_content">
            <h1>Telek szerkeztés</h1>
            <div class="inf">
                <div class="item">
                    <h3>Adatok szerkeztése</h3>
                    <form action="telekszerk.php?telid=<?php echo $telid?>" method="POST">
                    <table>
                        <tr>
                            <td>Helyrajz: </td>
                            <td><input type="text" name="hely" placeholder="<?php echo $tel["helyrajz"]?>"></td>
                        </tr>
                        <tr>
                            <td>Méret:</td>
                            <td><input type="number" name="meret" placeholder="<?php echo $tel["meret"]?>"></td>
                        </tr>
                        <tr>
                            <td>Érték</td>
                            <td><input type="number" name="ertek" placeholder="<?php echo $tel["ertek"]?>"></td>
                        </tr>
                    </table>
                    <input type="submit" value="Mentés" name="savetel">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['savetel'])) {
            update_telek($telid, $conn, $tel);
        }
        
    }
?>