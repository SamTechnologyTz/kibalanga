<?php
require '../Controller/Auth_user.php';
?>
<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fomu ya Maombi ya Kazi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="application-form-container">
        <h2>Fomu ya Maombi ya Kazi</h2>

        <form action="submit_application.php" method="POST">
            <label for="name">Jina Kamili:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Barua Pepe:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Namba ya Simu:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="position">Nafasi Unayoomba:</label>
            <input type="text" id="position" name="position" required>

            <label for="experience">Uzoefu (Kwa Miaka):</label>
            <input type="number" id="experience" name="experience" required>

            <label for="cover_letter">Barua ya Maelezo:</label>
            <textarea id="cover_letter" name="cover_letter" rows="5" required></textarea>

            <button type="submit" class="btn-submit" id="tuma-ombi">Tuma Maombi</button>
        </form>
    </div>
</body>
</html>
