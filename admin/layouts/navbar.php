<?php

if (!isset($_SESSION['uid'])) {
    header('Location: ../login.php');
    exit();
} else {
    echo '<div class="nav-container container-mid">
    <nav class="navbar">
        <div>
            <a href="./"><img src="../images/logos/ceft_logo_black.png" alt="Ceft Bank Logo" width="60" height="auto"></a>
        </div>
        <div>
            <a class="light-bg-link" href="../">Home</a>
            <a class="light-bg-link" href="../about.php">About</a>
            <a class="light-bg-link" href="../contact.php">Contact</a>
            <a class="nav-profile-link" href="./" style="margin-right: 0px;">' . $_SESSION['fname'] . '</a>

            <a class="nav-profile-link" style="margin-right: 0;" href="./settings.php">
                <span><img src="../images/icons/settings.png" alt="Settings Icon" width="12"></span>
            </a>
            <a class="nav-profile-link" href="../backend/public/logout.php">
                <span><img src="../images/icons/logout.png" alt="Logout Icon" width="12"></span>
            </a>

        </div>
    </nav>
</div>';
}
?>