<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SQL Query Form</title>
</head>

<body>
    <h1>更新 myschool 資料庫學生資料</h1>
    <form method="post" action="">
        <table border="1">
            <tr>
                <td>學號:</td>
                <td><input type="text" name="sid" size="6"/></td>
            </tr>
            <tr>
                <td>姓名:</td>
                <td><input type="text" name="sname" size="20"/></td>
            </tr>
            <tr>
                <td>性別:</td>
                <td>
                    <input type="radio" id="male" name="gender" value="M">
                    <label for="male">男</label>
                    <input type="radio" id="female" name="gender" value="F">
                    <label for="female">女</label>
                </td>
            </tr>
            <tr>
                <td>生日:</td>
                <td><input type="date" name="birthday"/></td>
            </tr>
            <tr>
                <td>電話:</td>
                <td><input type="text" name="phone" size="20"/></td>
            </tr>
        </table>
        <hr>
        <input type="submit" name="Update" value="更新">
    </form>

    <?php
    if (isset($_POST["Update"])) {
        require_once 'sup02_db_connection.php';
        
        // 使用函數獲取資料庫連接
        $conn = getDatabaseConnection();

        // 建立更新記錄的SQL指令字串
        $sql = "UPDATE students SET ";
        $sql .= "sname='".$_POST["sname"]."', ";
        $sql .= "gender='".$_POST["gender"]."', ";
        $sql .= "birthday='".$_POST["birthday"]."', ";
        $sql .= "phone='".$_POST["phone"]."' ";
        $sql .= "WHERE sno='".$_POST["sid"]."'";
        
        echo "<b>SQL指令: $sql</b><br/>";

        // 執行更新
        if ($conn->query($sql)) {
            echo "資料庫更新記錄成功, 影響記錄數: " . $conn->affected_rows . "<br/>";
        } else {
            echo "Error: " . $conn->error;
        }

        // 關閉連接
        $conn->close();
    }
    ?>
</body>

</html>