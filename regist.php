<?php
session_start();
function random($length = 6 , $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}
$_SESSION['send_code'] = random(6,1);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!--视口宽度为设备宽度，不能缩放-->
		<meta name="viewport" content="width=device-width,user-scalable=no">
		<!--qq浏览器下强制横盘或者竖屏显示-->
		<meta name="x5-orientation" content="portrait" />
		<!--qq浏览器下是否可以全屏-->
		<meta name="x5-fullscreen" content="true" />
		<!--UC浏览器下强制横盘或者竖屏显示-->
		<meta name="screen-orientation" content="portrait">
		<!--UC浏览器下是否可以全屏-->
		<meta name="full-screen" content="yes">
		<!--是否禁止识别手机和邮箱-->
		<meta name="format-detection" content="telephone=yes, email=no" />
		<script type="text/javascript" src="./php/jquery.js"></script>
		<script src="js/jquery-1.6.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/myJS.js" type="text/javascript" charset="utf-8"></script>
		<link rel="icon" href="img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<link rel="stylesheet" type="text/css" href="css/regist.css"/>
		<title>注册</title>
	</head>
	<script>
		    (function(){
		    	var html = document.documentElement;
		    	var hWidth = html.getBoundingClientRect().width;
				html.style.fontSize = hWidth/15 + "px";
		    })()
		</script>
	<body>
		
		<!--registLogin start-->
		<header class="registLogin clearfix">
			<a href="###" onclick="history.go(-1)"></a>
			<span>  进入蘑菇街</span>
		</header>
		<!--registLogin end-->
		
		
		<!--registBox start-->
		<section class="registBox">
			
			<form action="./php/active.php" method="post" name="formUser">
				<div class="phoneStyle">
				<p>国家与地区</p>
				<p>
					<i>中国</i>
					<i>+</i>
					<i>86</i>
				</p>
				</div>
				
				<div class="userPhoneBox">
					<span>你的手机号码是？</span>
					<input type="phone" id="mobile" name="mobile" placeholder="输入手机号码" maxlength="32" />
				</div>
				<div class="userNumBox">
					<span>验证码</span>
					<input type="text" id="validPhoneCode" name="mobile_code" placeholder="输入验证码" maxlength="32" />
					<a href="###" id="zphone" onclick="get_mobile_code()">发送验证码</a>
				</div>
				
				<input class="registBtn button" id='btn' type="submit" value=" 一键注册 " >
				<div class="registMore">
					<a href="###">帐号密码登录</a>
					<a href="###">免密登录</a>
				</div>
				
				<div class="qqLogin">
					<img src="img/qq.png" alt="" />
				</div>
			</form>
			
			
			
		</section>
		<!--registBox end-->
		
		
	</body>
	
	
	
	
	<script language="javascript">
			
			
			function get_mobile_code(){

		        $.post('./php/sms.php', {mobile:jQuery.trim($('#mobile').val()),send_code:<?php echo $_SESSION['send_code'];?>}, 
		        function(msg) {                                                                                      
		            console.log(jQuery.trim(unescape(msg)));
								if(msg=='提交成功'){
										RemainTime();
								}
		        });
			};
			
	
			
			
			
			
			var iTime = 59;
			var Account;
			function RemainTime(){
				//document.getElementById('zphone').disabled = true;
				var iSecond,sSecond="",sTime="";
				if (iTime >= 0){
					iSecond = parseInt(iTime%60);
					iMinute = parseInt(iTime/60)
					if (iSecond >= 0){
						if(iMinute>0){
							sSecond = iMinute + "分" + iSecond + "秒";
						}else{
							sSecond = iSecond + "秒";
						}
					}
					sTime=sSecond;
					if(iTime==0){
						clearTimeout(Account);
						sTime='获取手机验证码';
						iTime = 59;
						document.getElementById('zphone').disabled = false;
					}else{
						Account = setTimeout("RemainTime()",1000);
						iTime=iTime-1;
					}
				}else{
					sTime='没有倒计时';
				}
				document.getElementById('zphone').value = sTime;
			}	
		</script>
	
</html>
