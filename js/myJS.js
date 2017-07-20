
//把字符串编译成Unicode编码
function decToHex(str) {
	var res=[];
	for(var i=0;i < str.length;i++)
		res[i]=("0000"+str.charCodeAt(i).toString(16)).slice(-4);
	return "\\u"+res.join("\\u");
}


//Unicode编码 转换成字符串
function hexToDec(str) {
	str=str.replace(/\\/g,"%");
	return unescape(str);
}
