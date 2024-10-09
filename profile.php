<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Profile | NutriGuide</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        .header-area {
            background-color: #007bff;
            padding: 15px 0;
            color: white;
        }

        .navbar-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .site-navbar {
            display: flex;
            align-items: center;
        }

        .site-navbar .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .site-navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .site-navbar ul li {
            margin-left: 20px;
        }

        .site-navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .site-navbar ul li a.active {
            font-weight: bold;
        }

        /* Profile Container */
        .profile-container {
            flex-grow: 1;
            margin: 40px auto;
            width: 80%;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h2 {
            color: #007bff;
            font-size: 24px;
        }

        .profile-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .profile-pic {
            position: relative;
            margin-bottom: 20px;
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .profile-pic .edit-pic {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: white;
            padding: 5px;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            color: #007bff;
            cursor: pointer;
        }

        .profile-details {
            width: 60%;
        }

        .profile-details h3 {
            color: #333;
            margin-bottom: 15px;
        }

        .profile-details label {
            display: block;
            margin-top: 10px;
            font-size: 14px;
        }

        .profile-details input,
        .profile-details select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Footer Styling */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header-area">
        <div class="container">
            <div class="navbar-area">
                <nav class="site-navbar">
                    <a href="index.html" class="logo">NutriGuide</a>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="profile.html" class="active">Profile</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Profile Section -->
    <div class="profile-container">
        <div class="profile-header">
            <h2>User Profile</h2>
        </div>
        <div class="profile-content">
            <div class="profile-pic">
                <img src="images/user.png" alt="Profile Picture">
                <a href="#" class="edit-pic"><i class="fas fa-edit"></i></a>
            </div>
            <div class="profile-details">
                <h3>Personal Information</h3>
                <form action="update_profile.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="John Doe" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="johndoe@example.com" required>

                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" value="28" required>

                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" name="height" value="175" required>

                    <label for="weight">Weight (kg)</label>
                    <input type="number" id="weight" name="weight" value="70" required>

                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="activity">Activity Level</label>
                    <select id="activity" name="activity" required>
                        <option value="sedentary" selected>Sedentary</option>
                        <option value="light">Lightly Active</option>
                        <option value="moderate">Moderately Active</option>
                        <option value="active">Very Active</option>
                    </select>

                    <button type="submit" class="btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <p>© 2024 All Rights Reserved. Design by NutriGuide Team</p>
        </div>
    </footer>

</body>
</html>
