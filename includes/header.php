<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<header>
    <nav>
        <a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a>
        <a href="pages/register.php" class="<?php echo $current_page == 'register.php' ? 'active' : ''; ?>">Register</a>
        <a href="pages/guestbook.php" class="<?php echo $current_page == 'guestbook.php' ? 'active' : ''; ?>">Guestbook</a>
        <a href="pages/profile.php" class="<?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">Profile</a>
    </nav>
</header>