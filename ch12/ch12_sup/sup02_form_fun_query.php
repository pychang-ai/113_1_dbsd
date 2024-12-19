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
        require_once 'sup02_db_connection.php';
        $query = $_POST['query'];

        // 使用函數獲取資料庫連接
        $conn = getDatabaseConnection();

        // 執行查詢
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

        // 關閉連接
        $conn->close();
    }
    ?>
</body>

</html>