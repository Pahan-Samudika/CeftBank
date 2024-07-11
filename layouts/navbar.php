<?php




if (!isset($_SESSION['uid'])) {
    echo '<div class="nav-container container-mid">
    <nav class="navbar">
        <div>
            <a href="./"><img src="images/logos/ceft_logo_black.png" alt="Ceft Bank Logo" width="60" height="auto"></a>
        </div>
        <div>
            <a class="light-bg-link" href="./">Home</a>
            <a class="light-bg-link" href="./about.php">About</a>
            <a class="light-bg-link" href="./contact.php">Contact</a>
            <a class="light-bg-link" href="./login.php">Login</a>
        </div>
    </nav>
</div>';
} else {
    $role = $_SESSION['role'];
    echo '<div class="nav-container container-mid">
    <nav class="navbar">
        <div>
            <a href="./"><img src="images/logos/ceft_logo_black.png" alt="Ceft Bank Logo" width="60" height="auto"></a>
        </div>
        <div>
            <a class="light-bg-link" href="./">Home</a>
            <a class="light-bg-link" href="./about.php">About</a>
            <a class="light-bg-link" href="./contact.php">Contact</a>
            <a class="nav-profile-link" href="./'; if ($role == "customer") {echo 'dashboard';} else {echo 'admin';} echo'" style="margin-right: 0px;">' . $_SESSION['fname'] . '</a>

            <a class="nav-profile-link" style="margin-right: 0;" href="./'; if ($role == "customer") {echo 'dashboard';} else {echo 'admin';} echo'/settings.php">
                <span><img src="images/icons/settings.png" alt="Settings Icon" width="12"></span>
            </a>
            <a class="nav-profile-link" href="./backend/public/logout.php">
                <span><img src="images/icons/logout.png" alt="Logout Icon" width="12"></span>
            </a>

        </div>
    </nav>
</div>';
}
?>