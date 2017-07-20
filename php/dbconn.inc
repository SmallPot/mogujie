<?php
   //连接数据库$dbname   
   $conn=mysql_connect("localhost","root","") or
       die("连接MySQL服务器失败。".mysql_error());
   mysql_select_db($dbname) or
       die("选择数据库失败! ".mysql_error()); 
   
   //指定字符集和时区（可选）
   mysql_query("set names 'gbk'");  
   ini_set('date.timezone','Asia/Shanghai');  
?>