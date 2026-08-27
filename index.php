<?php
 include "conf.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IngatLAN</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-container login-container">
            <form action="index.php" method="POST">
            <h1>Bejelentkezés</h1>
            <div class="form-control">
                <input type="texz" name="name" id="name" placeholder="Adószám">
                <?php if (isset($_GET['errorname'])) { ?>
                    <small class="email-error-2"><?php echo $_GET['errorname']; ?></small>
                <?php } ?>
                <span></span>
            </div>
            <div class="form-control">
                <input type="password" name="password" id="password" placeholder="Jelszó">
                <?php if (isset($_GET['errorpass'])) { ?>
                    <small class="email-error-2"><?php echo $_GET['errorpass']; ?></small>
                <?php } ?>
                <span></span>
            </div>
            <div class="content">
                <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <label>Emlékezz rám</label>
                </div>
                <div class="pass-link">
                <a href="">Elfelejtett jelszó</a>
                </div>
            </div>
                <input type="submit" name="submit" value="Belépés" class="button">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel">
                    <h1 class="title">
                        Hello<br/>
                        Barátom!
                    </h1>
                    <p>Telkek és ingatlanok rendezett adatbázivál könnyebb tárolási lehetőséget biztosítunk!</p>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            login($conn);
        }
    ?>
</body>
</html>