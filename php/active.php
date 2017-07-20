<?php
  //接口类型：互亿无线触发短信接口，支持发送验证码短信、订单通知短信等。
  //账户注册：请通过该地址开通账户http://sms.ihuyi.com/register.html
  //注意事项：
  //（1）调试期间，请用默认的模板进行测试，默认模板详见接口文档；
  //（2）请使用APIID（查看APIID请登录用户中心->验证码、通知短信->帐户及签名设置->APIID）及 APIkey来调用接口；
  //（3）该代码仅供接入互亿无线短信接口参考使用，客户可根据实际需要自行编写；
  
  //extension=php_curl.dll
  //连接服务器




session_start();
		
if($_POST){
	//echo '<pre>';print_r($_POST);print_r($_SESSION);
		$username = trim(isset($_POST['userName']) ? $_POST['userName'] : $_POST['mobile']);
		$password = trim(isset($_POST['password']) ? $_POST['password'] : $_POST['mobile']);
		$phone = trim(isset($_POST['mobile']) ? $_POST['mobile'] : '');
		
		
	if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
		$_SESSION['mobile_code'];
		exit('手机验证码输入错误。000000');	
	}else{
		$dbname="mogujie";
		include("dbconn.inc");
		  
		//初始化:记录总数,每页显示记录数,当前页码
		$sql="INSERT INTO `user` (`userName`, `password`, `phone`,`rank`) VALUES ('{$username}', '{$password}', {$phone},'B')";
		$result=mysql_query($sql);
		
		
		$_SESSION['mobile'] = '';
		$_SESSION['mobile_code'] = '';	
		
		
		header("Location: http://127.0.0.1/mogujie/login.html"); 
		exit('注册成功。23333333');	
	}
}

?>