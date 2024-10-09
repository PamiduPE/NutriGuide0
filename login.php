<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nutriguidedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$redirect = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Retrieve user data
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $message = "Login successful!";
            $redirect = true;
        } else {
            $message = "Invalid password. Please try again.";
        }
    } else {
        $message = "No account found with this email. Please register.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NutriGuide</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Styles */
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        /* Feedback Styles */
        .success {
            color: #5cb85c;
            text-align: center;
        }

        .error {
            color: #d9534f;
            text-align: center;
        }

        p {
            text-align: center;
        }

        a {
            color: #5cb85c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function redirectToHome() {
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 2000); // Redirects after 2 seconds
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($message)): ?>
            <p class="<?php echo $redirect ? 'success' : 'error'; ?>"><?php echo $message; ?></p>
            <script>
                <?php if ($redirect): ?>
                    redirectToHome();
                <?php endif; ?>
            </script>
        <?php endif; ?>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
