<header>
    <nav>
        <div class="nav-kiri">
            <div class="logo">
                <a href="index.php">
                    <img src="img/al_hikam_logo.png" alt="Al-Hikam">
                </a>
            </div>
            <div class="al-hikam">
                <p>Buletin Al-Hikam</p>
            </div>
        </div>
        <ul>
            <li><a href="beranda.php" title="Beranda"><i class="fa-solid fa-house-chimney header"></i></a></li>
            <li><a href="cari.php" title="Cari Buletin"><i class="fa-solid fa-magnifying-glass header"></i></a></li>
            <li><a href="tentang.php" title="Tentang Halaman Web"><i class="fa-solid fa-circle-question header"></i></a></li>
            <?php 
                if(isset($_SESSION["username"])){
                    echo "<li><a href='logout.php'><i class='fa-solid fa-arrow-right-from-bracket header'></i></a></li>";
                }
                else{
                    echo "<li><a href='login.php' title='Masuk'><i class='fa-solid fa-arrow-right-to-bracket header'></i></a></li>";
                }
            ?>
            
            
        </ul>
    </nav>
</header>