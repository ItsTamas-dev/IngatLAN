<?php
    include_once "../conf.php";
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: ../index.php");
    }
    $ad;
    $admin = mysqli_query($conn, "SELECT szerepkor_id FROM felhasznalok JOIN szerepkor ON felhasznalok.szerepkor_id = szerepkor.id WHERE felhasznalok.id = {$_SESSION['user']}");
    if ($admin) {
        if(mysqli_num_rows($admin) > 0){
            $ad = mysqli_fetch_assoc($admin);
        }
    }
    
?>
<div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class="fa fa-warehouse"></i>
                <div class="logo_name">IngatLAN</div>
            </div>
            <button>
                <i class="fa fa-exchange-alt" id="btn"></i>
            </button>
        </div>
        <ul class="nav_list">
            <li>
                <a href="main.php">
                    <i class="fas fa-address-book"></i>
                    <span class="links_name">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="ingatlan.php">
                    <i class="fas fa-building"></i>
                    <span class="links_name">Ingatlan</span>
                </a>
                <span class="tooltip">Ingatlan</span>
            </li>
            <li>
                <a href="telek.php">
                    <i class="fas fa-city"></i>
                    <span class="links_name">Telek</span>
                </a>
                <span class="tooltip">Telek</span>
            </li>
            <!--<li>
                <a href="">
                    <i class="fas fa-pen-fancy"></i>
                    <span class="links_name">Telek szerkeztés</span>
                </a>
                <span class="tooltip">Telek szerk.</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-pen"></i>
                    <span class="links_name">Ingatlan szerkeztés</span>
                </a>
                <span class="tooltip">Ingatlan szerk.</span>
            </li>
            <li>
                <a href="">
                    <i class="far fa-edit"></i>
                    <span class="links_name">Profil szerkeztés</span>
                </a>
                <span class="tooltip">Profil szerk.</span>
            </li>-->
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <?php
                        if($us["szerep"]=="admin"){
                            echo '<img src=" ../img/admin.png" alt="" id="prof">';
                        }else{
                            echo '<img src=" ../img/user.png" alt="" id="prof">';
                        }
                    ?>
                    
                    <div class="name_job">
                        <div class="name">
                            <?php echo $us["nev"]?>
                        </div>
                        <div class="job">
                            <?php echo $us["szerep"]?>
                        </div>
                    </div>
                </div>
                <a href="main.php?logout_id=true">
                    <i class="fas fa-sign-out-alt"id="log_out"></i>
                </a>
            </div>
        </div>
    </div>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        prof.onclick = function(){
            sidebar.classList.toggle("active");
        }
    </script>