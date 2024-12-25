<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SQL Query Form</title>
</head>

<body>
    <h1>更新 myschool 資料庫學生資料</h1>
    
    <!-- Search Form -->
    <form method="post" action="">
        <label for="search_sid">請輸入學號查詢:</label>
        <input type="text" id="search_sid" name="search_sid" size="6"/>
        <input type="submit" name="Search" value="查詢">
    </form>
    
    <?php
    if (isset($_POST["Search"])) {
        require_once 'sup02_db_connection.php';
        
        // 使用函數獲取資料庫連接
        $conn = getDatabaseConnection();
        
        // 建立查詢記錄的SQL指令字串
        $search_sid = $_POST["search_sid"];
        $sql = "SELECT * FROM students WHERE sno='$search_sid'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sid = $row["sno"];
            $name = $row["name"];
            $address = $row["address"]; 
            $birthday = $row["birthday"];
            $username = $row["username"];
            $password = $row["password"];
        } else {
            echo "查無此學號的資料。<br/>";
        }
        
        // 關閉連接
        $conn->close();
    }
    ?>
    
    <!-- Update Form -->
    <form method="post" action="">
        <table border="1">
            <tr>
                <td>學號:</td>
                <td><input type="text" name="sid" size="6" value="<?php echo $sid ?? ''; ?>" readonly/></td>
            </tr>
            <tr>
                <td>姓名:</td>
                <td><input type="text" name="name" size="20" value="<?php echo $name ?? ''; ?>"/></td>
            </tr>
            <tr>
                <td>地址:</td>
                <td><input type="text" name="address" size="50" value="<?php echo $address ?? ''; ?>"/></td>
            </tr>
            <tr>
                <td>生日:</td>
                <td><input type="date" name="birthday" value="<?php echo $birthday ?? ''; ?>"/></td>
            </tr>
            <tr>
                <td>用戶名:</td>
                <td><input type="text" name="username" size="12" value="<?php echo $username ?? ''; ?>"/></td>
            </tr>
            <tr>
                <td>密碼:</td>
                <td><input type="password" name="password" size="12" value="<?php echo $password ?? ''; ?>"/></td>
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
        $sql .= "name='".$_POST["name"]."', ";
        $sql .= "address='".$_POST["address"]."', ";
        $sql .= "birthday='".$_POST["birthday"]."', ";
        $sql .= "username='".$_POST["username"]."', ";
        $sql .= "password='".$_POST["password"]."' ";
        $sql .= "WHERE sno='".$_POST["sid"]."'";
        
        echo "<b>SQL指令: $sql</b><br/>";
        
        // 執行更新
        if ($conn->query($sql)) {
            echo "資料庫更新記錄成功, 影響記錄數: {$conn->affected_rows}<br/>";
        } else {
            echo "Error: {$conn->error}";
        }
        
        // 關閉連接
        $conn->close();
    }
    ?>
</body>

</html>
