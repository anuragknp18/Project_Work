<?php 
include 'connect.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signUp'])) {
        // Registration process
        $uName = $_POST['uName'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            header("Location: index.php?error=email_exists");
            exit();
        } else {
            // Insert new user without hashing password
            $stmt = $conn->prepare("INSERT INTO users (uName, Email, Password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $uName, $Email, $Password);

            if ($stmt->execute()) {
                // Store uName in session and redirect to homepage
                session_start();
                $_SESSION['uName'] = $uName;
                $_SESSION['email'] = $Email;

                header("Location: homepage.php");
                exit();
            } else {
                header("Location: index.php?error=registration_failed");
                exit();
            }
        }
        $stmt->close();
    } elseif (isset($_POST['signIn'])) {
        // Login process
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['uName'] = $row['uName'];
            $_SESSION['email'] = $Email;

            header("Location: homepage.php");
            exit();
        } else {
            header("Location: index.php?error=login_failed");
            exit();
        }
        $stmt->close();
    }
}
$conn->close();
?>
