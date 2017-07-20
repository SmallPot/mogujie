<?php
/**
 * @ DB_Mysql.class.php
 * @ zmouse@vip.qq.com
 */

defined('IN_APP') or exit('Denied Access!');

class DB_Mysql implements DBInterface {

	private static $instanceObj;
	private $config = array();

	private $conn = null;

	private function __construct($config) {
		$this->config = $config;
		$this->connect();
	}
	//实例化接口
	public static function instance($config) {
		if (!self::$instanceObj) {
			$c = __CLASS__;
			self::$instanceObj = new $c($config);
		}
		return self::$instanceObj;
	}
	//链接数据库
	public function connect() {
		if (!$this->conn = @mysql_connect($this->config['db_host'], $this->config['db_user'], $this->config['db_password'])) $this->halt('链接数据库失败!');
		mysql_select_db($this->config['db_name'], $this->conn);
		$this->query("SET NAMES 'utf8'");
		
	}
	//查询数据库
	public function query($sql) {
		return mysql_query($sql);
	}
	//获取多条记录
	public function select($sql, $num=0, $mode=1) {
		if ($num) $sql .= " LIMIT {$num}";
		$query = $this->query($sql);
		$rs = $result = array();
		while ($result = mysql_fetch_array($query, $mode)) {
			$rs[] = $result;
		}
		return $rs;
	}
	//获取一条记录
	public function get($sql, $mode=1) {
		$rs = $this->select($sql, 1, $mode);
		return isset($rs[0])? $rs[0] : false;
	}
	//获取上一次insert的id
	public function getInsertId() {
		return mysql_insert_id();
	}
	
	//删除一条记录
	public function deletUser($sql) {
		return mysql_query($sql);
	}

	private function halt($msg, $exit=true) {
		if ($exit) {
			exit('<p>' . $msg . '</p>');
		} else {
			echo '<p>' . $msg . '</p>';
		}
	}

}