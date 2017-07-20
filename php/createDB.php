<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="inc/style.css" rel="stylesheet" type="text/css" />
<title>createDB</title>
</head>

<?php   
	header("Content-Type: text/html;charset=utf-8"); 
   //连接服务器，
   $conn=mysql_connect('localhost','root','') or die("连接服务器失败! ".mysql_error()); 
   mysql_query("set names 'utf8'");
   ini_set('date.timezone','Asia/Shanghai');

   
   //建立数据库，选择数据库 
   $sql="drop database if exists mogujie";
   mysql_query($sql); 
   $sql="create database mogujie";
   mysql_query($sql) or die("建立数据库失败".mysql_error()); 
   mysql_select_db("mogujie");


   //建立数据表


	 $sql="create table user(
           id int(50) auto_increment not null primary key,
           userName char(50) not null,
		   password char(50) not null,
		   phone char(50) not null,
		   state char(2),
		   rank char(10),
		   more char(100)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci,auto_increment=1";
		
		
   mysql_query($sql) or die("建立数据表失败。".mysql_error());
 

   //添加记录
   
       $sql="insert into user values
       		 (null,'admin','123456','13436256434','0','A',null),
             (null,'张三','123456','13436256434','0','B',null),
             (null,'李四','123456','13436256435','0','B',null),
             (null,'王五','123456','13436256436','0','B',null),
             (null,'赵六','123456','13436256436','0','B',null),
             (null,'jar','123456','13436256437','0','B',null),
             (null,'LINK','123456','13436256434','0','B',null),
             (null,'法师','123456','13436256435','0','B',null),
             (null,'死神','123456','13436256436','0','B',null),
             (null,'安安','123456','13436256436','0','B',null),
             (null,'火狐','123456','13436256437','0','B',null),
             (null,'黄浩然','123456','13436256434','0','B',null),
             (null,'巨神峰','123456','13436256435','0','B',null),
             (null,'乐福','123456','13436256436','0','B',null),
             (null,'菲奥尔','123456','13436256436','0','B',null),
             (null,'贺卫方','123456','13436256437','0','B',null),
             (null,'福娃','123456','13436256434','0','B',null),
             (null,'达尔肤','123456','13436256435','0','B',null),
             (null,'乐凯','123456','13436256436','0','B',null),
             (null,'圣达菲','123456','13436256436','0','B',null),
             (null,'滴答','123456','13436256437','0','B',null),
             (null,'发发','123456','13436256434','0','B',null),
             (null,'大富翁','123456','13436256435','0','B',null),
             (null,'伐','123456','13436256436','0','B',null),
             (null,'Jack','123456','13436256436','0','B',null),
             (null,'恶女','123456','13436256437','0','B',null),
             (null,'腹黑','123456','13436256434','0','B',null),
             (null,'发哪儿','123456','13436256435','0','B',null),
             (null,'访问','123456','13436256436','0','B',null),
             (null,'赵分六','123456','13436256436','0','B',null),
             (null,'而非','123456','13436256437','0','B',null),
             (null,'个人','123456','13436256436','0','B',null),
             (null,'废物','123456','13436256436','0','B',null),
             (null,'服务器后果','123456','13436256437','0','B',null),
             (null,'范围','123456','13436256434','0','B',null),
             (null,'BaVAria','123456','13436256435','0','B',null),
             (null,'GEG','123456','13436256436','0','B',null),
             (null,'跟他人','123456','13436256436','0','B',null),
             (null,'跳舞','123456','13436256437','0','B',null),
             (null,'开头是','123456','13436256434','0','B',null),
             (null,'gerEEn','123456','13436256435','0','B',null),
             (null,'FA','123456','13436256436','0','B',null),
             (null,'erg','123456','13436256436','0','B',null),
             (null,'fw','123456','13436256437','0','B',null),
             (null,'jtwf','123456','13436256438','0','B',null)";
			 
       mysql_query($sql) or die("插入记录失败。".mysql_error());
  


   //关闭连接
   mysql_close($conn);
   
   
?>
<?php
//	$url="index.html";
//	echo "<script language='javascript'type='text/javascript'>";
//	echo "location.href='$url'";
//	echo "</script>";
?>
</body></html>
