<link rel="stylesheet" href="css/navigation.css?v=<?php echo time(); ?>">

<div class="wrapper">
    <!-- top navigation -->
    <div class="topbar">
        <div class="search-filter">
            <form action="" method="post" class="search-form">
                <input type="text" name="searchbalk" placeholder="Zoek een titel">
                <button type="submit" name="search"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <ul>
            <li>
                <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>" class="profile"><i class="fas fa-user" style="color: #C78743;"></i> Profiel</a>
            </li>
        </ul>
    </div>

    <!-- side navigation -->
    <div class="sidebar">
        <div class="home">
            <h2><a href="buurtstem.php">Buurtstem</a></h2>
        </div>

        <ul>
            <li>
                <a href="forum.php" class="forum"><i class="fas fa-comments" style="color: #C78743;"></i> Forum</a>
            </li>
            <li>
                <a href="groups.php" class="groups"><i class="fas fa-users" style="color: #C78743;"></i> Groepen</a>
            </li>
            <li>
                <a href="service.php" class="service"><i class="fas fa-calendar-alt" style="color: #C78743;"></i> Dienstverlening</a>
            </li>
            <li>
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt" style="color: #C78743;"></i> Afmelden</a>
            </li>
        </ul>
    </div>
</div>