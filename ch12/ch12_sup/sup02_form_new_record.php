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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['insert'])) {
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

    <h1>Insert New Student Record</h1>
    <form method="post" action="">
        <label for="sno">Student Number:</label><br>
        <input type="text" id="sno" name="sno"><br><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br><br>
        <label for="birthday">Birthday:</label><br>
        <input type="date" id="birthday" name="birthday"><br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Insert" name="insert">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        $sno = $_POST['sno'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Database connection
        $servername = "localhost";
        $db_username = "root";
        $db_pwd = "";
        $dbname = "myschool";

        // Create connection
        $conn = new mysqli($servername, $db_username, $db_pwd, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert query
        $insert_query = "INSERT INTO students (sno, name, address, birthday, username, password) VALUES ('$sno', '$name', '$address', '$birthday', '$username', '$password')";

        if ($conn->query($insert_query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>

</html>