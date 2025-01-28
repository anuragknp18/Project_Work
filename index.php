<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up and Sign-In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Delius', cursive;
            background: url('3.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            margin: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
        }

        .formtitle {
            font-family: 'Iceland', sans-serif;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #666;
        }

        .btn input {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .btn input:hover {
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.5);
            transform: translateY(-3px);
        }

        .btn input:active {
            transform: translateY(0);
        }

        .links {
            text-align: center;
            margin-top: 1rem;
        }

        .links button {
            background: none;
            border: none;
            color: #007BFF;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: underline;
        }

        .links button:hover {
            color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }

        header, footer {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            font-family: 'Iceland', sans-serif;
        }

        header {
            position: sticky;
            top: 0;
        }

        footer {
            position: sticky;
            bottom: 0;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Our Platform</h1>
</header>

<div class="main-container">

    <?php 
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'email_exists') {
            echo "<p class='error-message'>Email already registered. Please log in.</p>";
        } elseif ($error === 'registration_failed') {
            echo "<p class='error-message'>Registration failed. Please try again.</p>";
        } elseif ($error === 'login_failed') {
            echo "<p class='error-message'>Invalid email or password. Please try again.</p>";
        }
    }
    ?>

    <div class="form-container" id="signup" 
         style="display:<?php echo isset($_GET['showSignIn']) && $_GET['showSignIn'] === 'true' ? 'none' : 'block'; ?>;">
        <h1 class="formtitle">Sign-Up/Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <label for="uName">User Name:</label>
                <input type="text" name="uName" id="uName" required placeholder="User Name">
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <label for="email">Email:</label>
                <input type="email" name="Email" id="email" required placeholder="Email">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <label for="pass">Password:</label>
                <input type="password" name="Password" id="pass" required placeholder="Password">
            </div>
            <div class="btn">
                <input type="submit" value="Sign-Up" name="signUp">
            </div>
        </form>
        <div class="links">
            <p>Already have an Account? | <button id="btn1">Sign In</button></p>
        </div>
    </div>

    <div class="form-container" id="signin" 
         style="display:<?php echo isset($_GET['showSignIn']) && $_GET['showSignIn'] === 'true' ? 'block' : 'none'; ?>;">
        <h1 class="formtitle">Sign-In/Login</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <label for="email1">Email:</label>
                <input type="email" name="Email" id="email1" required placeholder="Email">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <label for="pass1">Password:</label>
                <input type="password" name="Password" id="pass1" required placeholder="Password">
            </div>
            <div class="btn">
                <input type="submit" value="Sign-In" name="signIn">
            </div>
        </form>
        <div class="links">
            <p>Don't have an Account? | <button id="btn2">Sign Up</button></p>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 Our Platform. All Rights Reserved.</p>
</footer>

<script>
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');
    const signInForm = document.getElementById('signin');
    const signUpForm = document.getElementById('signup');

    btn1.addEventListener('click', function() {
        signInForm.style.display = "block";
        signUpForm.style.display = "none";
    });

    btn2.addEventListener('click', function() {
        signUpForm.style.display = "block";
        signInForm.style.display = "none";
    });
</script>

</body>
</html>
