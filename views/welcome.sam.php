<?php
Session::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="assets/img/icon.jpeg" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.jpeg">
    <link rel="icon" href="assets/img/icon.jpeg">
    <title><?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
    <header class="header">
        <div class="top1">
            <div class="logo"><img alt="" width="70rem" src="assets/img/logo.png"></div>
            <div class="app_name"><h1><?php echo APP_NAME; ?></h1></div>
        </div>
        <div class="top2">
            <nav>
                <ul>
                    <li><a href="/" class="current">home</a></li> |
                    <li><a href="profile">Dashboard</a></li>|
                    <li><a href="logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
            color: #333;
            overflow-x: hidden;
        }

        /* Loading Animation */
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Spinner styles */
        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        /* Page Content */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            opacity: 0; /* Initially hidden */
            animation: fadeIn 1.5s ease-in-out 1.5s forwards;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            animation: slideInFromTop 1s ease-out;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin: 20px 0;
            animation: fadeIn 2s ease-in-out;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            animation: bounceIn 2s ease-in-out;
        }

        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.1);
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInFromTop {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Spinner Animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>

    <!-- Loading Animation -->
    <div id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        ul {
            list-style-type: square;
            margin-left: 20px;
        }
    </style>

    <h1>Welcome to Kibalanga – Your Trusted Solution Partner</h1>

    <p>Thank you for choosing Kibalanga! We're excited to have you onboard. Below is a deeper look into what we offer and how we can help you achieve your goals.</p>

    <h2>Who We Are</h2>
    <p>Kibalanga is a comprehensive framework designed to provide efficient, reliable, and secure solutions for your web development and technical needs. Whether you're building a small project or scaling up to enterprise-level applications, Kibalanga has the tools to ensure success.</p>

    <h2>What We Offer</h2>
    <ul>
        <li><strong>Customizable Web Solutions</strong>: Kibalanga provides flexible frameworks and packages tailored to your unique requirements. From simple websites to complex platforms, we support a wide range of projects.</li>
        <li><strong>Seamless Integration</strong>: We help integrate advanced features into your platform, ensuring your systems work smoothly together. Whether you're integrating third-party services or creating custom solutions, Kibalanga simplifies the process.</li>
        <li><strong>Support & Maintenance</strong>: Our dedicated team offers ongoing support to ensure your project remains up-to-date and runs efficiently. We handle regular updates, bug fixes, and security patches, so you can focus on growing your business.</li>
    </ul>

    <h2>Why Choose Kibalanga?</h2>
    <ul>
        <li><strong>Security</strong>: Your data and systems are in safe hands. Kibalanga’s design prioritizes security, helping protect sensitive information and ensuring that your users' privacy is respected.</li>
        <li><strong>Scalability</strong>: As your project grows, Kibalanga grows with you. Our frameworks and solutions are scalable, enabling you to expand without worrying about performance or reliability.</li>
        <li><strong>Tailored Solutions</strong>: We work with you to understand your unique needs and deliver solutions that match your business objectives. Whether you're in e-commerce, education, or any other sector, Kibalanga has a solution for you.</li>
    </ul>

    <h2>What’s Next?</h2>
    <p>If you’re ready to start building or need assistance, our team is here to guide you every step of the way. Explore our documentation for in-depth guides on how to use our platform, or get in touch with our support team for personalized help. We’re committed to your success and look forward to helping you build something extraordinary.</p>

    </div>

    <script>
        // JavaScript to hide the loading screen after the page is fully loaded
        window.onload = function() {
            // Hide the loading animation once everything is loaded
            document.getElementById("loading").style.display = "none";
        };
    </script>

    <footer>
        <div class="copy">
            <p><a href="https://www.reconnect.co.tz" target="_blank" rel="noopener noreferrer"><?php echo DEV; ?></a></p>
            <p><?php echo date('Y').'&copy;  ';  echo "UTPC"; ?></p>
        </div>
    </footer>
</body>
</html>



    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
            color: #333;
            overflow-x: hidden;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }
        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            animation: slideInFromTop 1s ease-out;
        }
        p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin: 20px 0;
            animation: fadeIn 2s ease-in-out;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            animation: bounceIn 2s ease-in-out;
        }
        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.1);
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideInFromTop {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style> -->

