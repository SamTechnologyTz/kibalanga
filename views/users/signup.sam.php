<?php
//
?>
<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jisajili - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="../assets/css/userform.css">
</head>
<body>

<div class="register-container">
    <h2>Jisajili na <?php echo APP_NAME; ?></h2>
    <p>Tafadhali jaza taarifa zako ili kujiandikisha kama mtumiaji wa tovuti yetu.</p>
    <form action="user_register" method="POST">
        <label for="username">Jina la Mtumiaji:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Barua Pepe:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Nenosiri:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Thibitisha Nenosiri:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" onclick="user_register()">Jisajili</button>
        <p>Umesajiliwa tayari? <a href="login">Ingia hapa</a>.</p>
    </form>
</div>
<script src="../application/users.js"></script>
</body>
</html>

