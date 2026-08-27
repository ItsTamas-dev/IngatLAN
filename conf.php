<?php
$conn = mysqli_connect("localhost", "root", "", "ingatlan");
mysqli_set_charset($conn, "UTF8");
function login($conn){
    $name = $_POST["name"];
    $pass = $_POST["password"];
    if(empty($name)){
        header("Location: index.php?errorname=Az adószámot megkell adni!");
    }else if(empty($pass)){
        header("Location: index.php?errorpass=A jelszót megkell adni!");
    }else{
        $s_name = mysqli_query($conn, "SELECT felhasznalok.*, szerepkor.szerep FROM felhasznalok JOIN szerepkor ON felhasznalok.szerepkor_id = szerepkor.id WHERE adoszam = '{$name}'");
        if(mysqli_num_rows($s_name)){
            $us = mysqli_fetch_assoc($s_name);
            if(md5($pass) == $us["jelszo"]){
                $update = mysqli_query($conn, "UPDATE felhasznalok SET bevan = 1 WHERE id = {$us["id"]}");
                session_start();
                $_SESSION['user'] = $us["id"];
                header("Location: php/main.php");
            }else{
                header("Location: index.php?errorpass=Hibás jelszó!");
            }
        }else{
            header("Location: index.php?errorname=Hibás adószám!");
        }
    }
}
function update_user($id, $conn, $us){
    $newnev = $_POST["nev"];
    $newado = $_POST["ado"];
    $newlak = $_POST["lakhely"];
    $newtel = $_POST["tel"];
    $newszul = $_POST["szul"];
    $newdate = $_POST["date"];
    if(empty($newnev)){
        $newnev = $us["nev"];
    }
    if(empty($newado)){
        $newado = $us["adoszam"];
    }
    if(empty($newlak)){
        $newlak = $us["lakcim"];
    }
    if(empty($newtel)){
        $newtel = $us["telefon"];
    }
    if(empty($newszul)){
        $newszul = $us["szulo"];
    }
    if(empty($newdate)){
        $newdate = $us["szul_datum"];
    }
    $update = mysqli_query($conn, "UPDATE felhasznalok SET nev = '{$newnev}', adoszam = {$newado}, lakcim = '{$newlak}', telefon = '{$newtel}', szul_datum = '{$newdate}', szulo = '{$newszul}' WHERE id = {$id}");
    if($update){
        echo "<script>alert('Sikeres változtatás!')</script>";
    }else{
        echo "<script>alert('Sikertelen változtatás!')</script>";
    }
}
function changePass($id, $conn, $us){
    $old = $_POST["old"];
    $new = $_POST["new"];
    $newre = $_POST["newre"];
    if(empty($old) || empty($new) || empty($newre)){
        echo "<script>alert('Minden jelszót adjon meg!!')</script>";
    }else if(md5($old) != $us["jelszo"]){
        echo "<script>alert('Hibás a régi jelszó!!')</script>";
    }else if($new != $newre){
        echo "<script>alert('A két új jelszó nem egyezik!!')</script>";
    }else{
        $fel = md5($new);
        $date = date("Y-m-d");
        $update = mysqli_query($conn, "UPDATE felhasznalok SET jelszo = '{$fel}', utolso = '{$date}' WHERE id = {$id}");
        if($update){
            echo "<script>alert('Sikeres változtatás!')</script>";
        }else{
            echo "<script>alert('Sikertelen változtatás!')</script>";
        }
    }
}
function update_ingatlan($id, $conn, $ing){
    $newev = $_POST["ev"];
    $newirszam = $_POST["irszam"];
    $newtelep = $_POST["telepules"];
    $newkerulet = $_POST["kerulet"];
    $newertek = $_POST["ertek"];
    $newtulaj = $_POST["tulajdon"];
    if(empty($newev)){
        $newev = $ing["epites"];
    }
    if(empty($newirszam)){
        $newirszam = $ing["ir_szam"];
    }
    if(empty($newtelep)){
        $newtelep = $ing["telepules"];
    }
    if(empty($newkerulet)){
        $newkerulet = $ing["kozterulet"];
    }
    if(empty($newertek)){
        $newertek = $ing["ertek"];
    }
    $update = mysqli_query($conn, "UPDATE ingatlanok SET epites = '{$newev}', ir_szam = {$newirszam}, telepules = '{$newtelep}', kozterulet = '{$newkerulet}', ertek = {$newertek} WHERE id = {$id}");
    if($update){
        echo "<script>alert('Sikeres változtatás!')</script>";
    }else{
        echo "<script>alert('Sikertelen változtatás!')</script>";
    }
}
function update_telek($id, $conn, $tel){
    $newhely = $_POST["hely"];
    $newmeret = $_POST["meret"];
    $newertek = $_POST["ertek"];
    if(empty($newmeret)){
        $newmeret = $tel["meret"];
    }
    if(empty($newertek)){
        $newertek = $tel["ertek"];
    }
    if(empty($newhely)){
        $newhely = $tel["helyrajz"];
    }
    $update = mysqli_query($conn, "UPDATE telkek SET helyrajz = '{$newhely}', meret = {$newmeret}, ertek = {$newertek} WHERE id = {$id}");
    if($update){
        echo "<script>alert('Sikeres változtatás!')</script>";
    }else{
        echo "<script>alert('Sikertelen változtatás!')</script>";
    }
}
?>
