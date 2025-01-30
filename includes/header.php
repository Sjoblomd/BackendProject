<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <nav>
        <a href="/~sjoblomd/BackEnd/BackendProject/" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a>
        <a href="/~sjoblomd/BackEnd/BackendProject/pages/register.php" class="<?php echo $current_page == 'register.php' ? 'active' : ''; ?>">Register</a>
        <a href="/~sjoblomd/BackEnd/BackendProject/pages/guestbook.php" class="<?php echo $current_page == 'guestbook.php' ? 'active' : ''; ?>">Guestbook</a>
        <a href="/~sjoblomd/BackEnd/BackendProject/pages/profile.php" class="<?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">Profile</a>
    </nav>
</header>