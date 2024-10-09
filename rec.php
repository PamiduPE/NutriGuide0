<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recommendation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            gap: 20px;
        }
        .form-container {
            flex: 1;
            max-width: 400px;
        }
        .results-container {
            flex: 2;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        #recommendations h2 {
            color: #4CAF50;
        }
        #recommendations table {
            margin-top: 10px;
        }
        .food-grams {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Food Recommendation</h1>
            <form id="recommendation-form" method="post">
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" required>
                
                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" required>
                
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
                
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                
                <label for="activity_level">Activity Level:</label>
                <select id="activity_level" name="activity_level" required>
                    <option value="sedentary">Sedentary</option>
                    <option value="light">Light</option>
                    <option value="moderate">Moderate</option>
                    <option value="active">Active</option>
                </select>
                
                <label for="goal">Goal:</label>
                <select id="goal" name="goal" required>
                    <option value="muscle gain">Muscle Gain</option>
                    <option value="fat loss">Fat Loss</option>
                    <option value="maintain">Maintain</option>
                </select>
                
                <button type="submit">Get Recommendations</button>
            </form>
        </div>
        <div class="results-container" id="recommendations">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nutriguidedb";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $weight = $conn->real_escape_string($_POST['weight']);
            $height = $conn->real_escape_string($_POST['height']);
            $age = $conn->real_escape_string($_POST['age']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $activity_level = $conn->real_escape_string($_POST['activity_level']);
            $goal = $conn->real_escape_string($_POST['goal']);
            $created_at = date('Y-m-d H:i:s'); // Get current timestamp

            // Insert user data
            $sql = "INSERT INTO user_history (weight, height, age, gender, activity_level, goal, created_at) 
                    VALUES ('$weight', '$height', '$age', '$gender', '$activity_level', '$goal', '$created_at')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Data submitted successfully!</p>";

                // Retrieve recommended foods (sample logic)
                $rec_sql = "SELECT * FROM food_recommendations LIMIT 5";  // Adjust query as needed
                $result = $conn->query($rec_sql);

                if ($result->num_rows > 0) {
                    echo "<h2>Your Recommended Foods:</h2>";
                    echo "<table><tr><th>Food</th><th>Calories</th><th>Protein (g)</th><th>Fats (g)</th><th>Carbs (g)</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["food"]."</td>
                                <td>".$row["calories"]."</td>
                                <td>".$row["protein"]."</td>
                                <td>".$row["fats"]."</td>
                                <td>".$row["carbs"]."</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No recommendations available.</p>";
                }

            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>
