<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SQL Query Form</title>
</head>

<body>
    <h1>Execute SQL Query on myschool Database</h1>
    <form method="post" action="">
        <label for="query">SQL Query:</label><br>

        <textarea id="query" name="query" rows="4" cols="50">
SELECT * FROM students
        </textarea><br><br>
        <input type="submit" value="Execute">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = $_POST['query'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myschool";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Execute query
        if ($result = $conn->query($query)) {
            echo "<h2>Query Results:</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            while ($field = $result->fetch_field()) {
                echo "<th>{$field->name}</th>";
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>{$data}</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            $result->free();
        } else {
            echo "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>

</html>