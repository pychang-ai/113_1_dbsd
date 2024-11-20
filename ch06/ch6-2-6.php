<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>ch6-2-6.php</title>
   <?php
   // 函數計算體積
   function volume($length, $width = 10, $height = 15)
   {
      print $length . "x" . $width . "x" . $height . "= ";
      return $length * $width * $height;
   }
   ?>
</head>

<body>
   <?php
   // 指定變數值
   $l = 15;
   $w = 20;
   $h = 25;
   // 建立函數變數
   $func = "volume"; // 函數名稱 
   // 計算並顯示盒子體積，使用所有參數
   print "盒子體積: " . $func($l, $w, $h) . "<br/>";
   // 計算並顯示盒子體積，使用預設高度
   print "盒子體積: " . $func($l, $w) . "<br/>";
   ?>
</body>

</html>