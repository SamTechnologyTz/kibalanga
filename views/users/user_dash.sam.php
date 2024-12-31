<?php
$token = $_SESSION['id'];

$user = $action->readone($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="../assets/css/userform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>

<div class="dashboard-container">
    <!-- Side Navigation -->
    <nav class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="home"><i class="fas fa-home"></i> mwanzo</a></li>
            <li><a href="user_dashboard.php"><i class="fas fa-tachometer-alt"></i> Mchoro Mkuu</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Wasifu Wangu</a></li>
            <li><a href="jobs.php"><i class="fas fa-briefcase"></i> Nafasi za Kazi</a></li>
            <li><a href="applications.php"><i class="fas fa-file-alt"></i> Maombi Yangu</a></li>
            <li><a href="settings.php"><i class="fas fa-cog"></i> Mipangilio</a></li>
            <li><?php echo "<a href='deleteuser?token={$token}'>Futa Account</a>"?></li>
            <li><a href="logout"><i class="fas fa-sign-out-alt"></i> Toka</a></li>
        </ul>
    </nav>
    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Karibu, <?php echo $user['username']; ?><span id="user-name"></span></h1>
            <p>Hapa unaweza kuona taarifa zako na kudhibiti akaunti yako.</p>
        </header>

        <section class="overview">
            <div class="card">
                <h3>Maombi Yako ya Kazi</h3>
                <p>Jumla ya Maombi: <span id="maombi-jumla"></span></p>
            </div>
            <div class="card">
                <h3>Huduma za Kampuni</h3>
                <p>Angalia huduma za hivi karibuni.</p>
            </div>
            <div class="card">
                <h3>Update za Nafasi za Kazi</h3>
                <p>Nafasi mpya: <span id="nafasi-mpya"></span></p>
            </div>
        </section>
    </div>
</div>

</body>
</html>
