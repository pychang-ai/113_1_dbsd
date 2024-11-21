<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>ch6-5.php</title>
    <?php
    // 引入 ch6-5-1.inc 檔案
    include "ch6-5-1.inc";
    // 引入 ch6-5-2.inc 檔案，只引入一次
    include_once("ch6-5-2.inc");
    ?>
</head>

<body>
    <?php
    require "ch6-5-1.inc";
    $amount = 1000;
    $rate = 28.1;
    // 呼叫函數
    $result = rateExchange($amount, $rate);
    print "1000美金兌換新台幣=" . $result . "元<br/>";
    require("ch6-5-1.inc");
    $file = "ch6-5-1.inc";
    require $file;
    ?>
</body>

</html>