<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SQL Query Form</title>
</head>

<body>
    <h1>從 myschool 資料庫刪除學生資料</h1>
    <form method="post" action="">
        <table border="1">
            <tr>
                <td>學號:</td>
                <td><input type="text" name="sid" size="6"/></td>
            </tr>
        </table>
        <hr>
        <input type="submit" name="Delete" value="刪除">
    </form>

    <?php
    if (isset($_POST["Delete"])) {
        require_once 'sup02_db_connection.php';
        
        // 使用函數獲取資料庫連接
        $conn = getDatabaseConnection();

        // 建立刪除記錄的SQL指令字串
        $sql = "DELETE FROM students WHERE sno = '".$_POST["sid"]."'";
        echo "<b>SQL指令: $sql</b><br/>";

        // 執行刪除
        if ($conn->query($sql)) {
            echo "資料庫刪除記錄成功, 影響記錄數: " . $conn->affected_rows . "<br/>";
        } else {
            echo "Error: " . $conn->error;
        }

        // 關閉連接
        $conn->close();
    }
    ?>
</body>

</html>