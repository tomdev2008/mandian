<?php
/**
 * 仿写CI的MongoDB
 * @author sparkHuang 2011-11-03
 *
 */
class CI_Mongo {

	private $mongo_config = "mongo_config.php";
	
	private $connection;
	private $db;
	private $mongo_connect_string;
	
	private $host;
	private $port;
	private $user;
	private $pass;
	
	private $dbname;
	private $persist;
	private $persist_key;

	private $selects = array();
	private $wheres  = array();
	private $sorts   = array();
	
	private $limit   = 999999;
	private $offset  = 0;
	
	public function __construct() {
		if ( ! class_exists('Mongo')) {
			$this->log_error("The MongoDB PECL extentiosn has not been installed or enabled.");
			exit;
		}
		
		$this->connection_string();
		$this->connect();
	}
	
	/**
	 * 更改数据库
	 *
	 */
	public function switch_db($database = '') {
		if (empty($database)) {
			$this->log_error("To switch MongoDB databases, a new database name must be specified");
			exit;
		}
		$this->dbname = $database;
		try {
			$this->db = $this->connection->{$this->dbname};
			return true;
		} catch(Exception $e) {
			$this->log_error("Unable to switch Mongo Databases: {$e->getMessage()}");
			exit;
		}
	}
	
	/**
	 * 设置select字段
	 *
	 */
	public function select($includs = array(), $excludes = array()) {
		if ( ! is_array($includs)) {
			$includs = (array)$includs;
		}
		
		if ( ! is_array($excludes)) {
			$excludes = (array)$excludes;
		}
		
		if ( ! empty($includs)) {
			foreach ($includs as $col) {
				$this->selects[$col] = 1;
			}
		} else {
			foreach ($excludes as $col) {
				$this->selects[$col] = 0;
			}
		}
		
		return($this);
	}
	
	/**
	 * where条件查询判断
	 *
	 * @usage = $this->mongo_db->where(array('foo' => 'bar'))->get('foobar');
	 *
	 */
	public function where($wheres = array()) {
		if ( ! is_array($wheres)) {
			$wheres = (array)$wheres;
		}
		
		if ( ! empty($wheres)) {
			foreach($wheres as $wh => $val) {
				$this->wheres[$wh] = $val;
			}
		}
		
		return($this);
	}

	/**
	 * where ... in .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_in('foo', array('bar', 'zoo'))->get('foobar');
	 *
	 */
	public function where_in($field = '', $in = array()) {
		$this->where_init($field);
		$this->wheres[$field]['$in'] = $in;
		return($this);
	}
	
	/**
	 * where ... not in .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_not_in('foo', array('bar', 'zoo'))->get('foobar');
	 *
	 */
	public function where_not_in($field = '', $in = array()) {
		$this->where_init($field);
		$this->wheres[$field]['$nin'] = $in;
		return($this);
	}
	
	/**
	 * where ... $field > $x .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_gt('foo', 20)->get('foobar');
	 *
	 */
	public function where_gt($field = '', $x) {
		$this->where_init($field);
		$this->wheres[$field]['$gt'] = $x;
		return($this);
	}
	
	/**
	 * where ... $field >= $x .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_gte('foo', 20)->get('foobar');
	 *
	 */
	public function where_gte($field = '', $x) {
		$this->where_init($field);
		$this->wheres[$field]['$gte'] = $x;
		return($this);
	}
	
	/**
	 * where ... $field < $x .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_lt('foo', 20)->get('foobar');
	 *
	 */
	public function where_lt($field = '', $x) {
		$this->where_init($field);
		$this->wheres[$field]['$lt'] = $x;
		return($this);
	}
	
	/**
	 * where ... $field <= $x .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_lte('foo', 20)->get('foobar');
	 *
	 */
	public function where_lte($field = '', $x) {
		$this->where_init($field);
		$this->wheres[$field]['$lte'] = $x;
		return($this);
	}
	
	/**
	 * where ... $field >= $x AND $field <= $y .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_between('foo', 20, 30)->get('foobar');
	 *
	 */
	public function where_between($field = '', $x, $y) {
		$this->where_init($field);
		$this->wheres[$field]['$gte'] = $x;
		$this->wheres[$field]['$lte'] = $y;
		return($this);
	}
	
	/**
	 * where ... $field > $x AND $field < $y .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_between_ne('foo', 20, 30)->get('foobar');
	 *
	 */
	public function where_between_ne($field = '', $x, $y) {
		$this->where_init($field);
		$this->wheres[$field]['$gt'] = $x;
		$this->wheres[$field]['$lt'] = $y;
		return($this);
	}
	
	/**
	 * where ... $field <> $x .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_ne('foo', 20)->get('foobar');
	 *
	 */
	public function where_ne($field = '', $x) {
		$this->where_init($field);
		$this->wheres[$field]['$ne'] = $x;
		return($this);
	}
	
	/**
	 * where ... or .. 条件查询判断
	 *
	 * @usage = $this->mongo_db->where_or('foo', array('foo', 'bar'))->get('foobar');
	 *
	 */
	public function where_or($field = '', $values) {
		$this->where_init($field);
		$this->wheres[$field]['$or'] = $values;
		return($this);
	}
	
	/**
	 *	where ... and .. 条件查询判断
	 *	
	 *	@usage = $this->mongo_db->where_and( array ( 'foo' => 1, 'b' => 'someexample' );
	 */
	 
	 public function where_and( $elements_values = array() ) {
	 	foreach ( $elements_values as $element => $val ) {
	 		$this->wheres[$element] = $val;
	 	}
	 	return($this);
	 }
	 
	/**
	 *	where $field % $num = $result
	 *
	 *	@usage = $this->mongo_db->where_mod( 'foo', 10, 1 );
	 */	 
	 public function where_mod( $field, $num, $result ) {
	 	$this->where_init($field);
	 	$this->wheres[$field]['$mod'] = array($num, $result);
	 	return($this);
	 }
	 
	/**
	 *  where size
	 *
	 *	Get the documents where the size of a field is in a given $size int
	 *
	 *	@usage : $this->mongo_db->where_size('foo', 1)->get('foobar');
	 */
	public function where_size($field = "", $size = "") {
		$this->where_init($field);
		$this->wheres[$field]['$size'] = $size;
		return ($this);
	}
	
	/**
	 * like条件查询(PHP中定义MongoRegex类实现)
	 *
	 * @usage : $this->mongo_db->like('foo', 'bar', 'im', false, false)->get();
	 */
	public function like($field = "", $value = "", $flags = "i", $enable_start_wildcard = true, $enable_end_wildcard = true) {
		$field = (string)$field;
		$this->where_init($field);
		$value = (string)$value;
		$value = quotmeta($value);
		
		if (true !== $enable_start_wildcard) {
			$value = "^".$value;
		}
		
		if (true !== $enable_end_wildcard) {
			$value .= "$";
		}
		
		$regex = "/$value/$flags";
		$this->wheres[$field] = new MongoRegex($regex);
		return($this);
	}
	
	/**
	 * order排序( 1 => ASC, -1 => DESC)
	 *
	 * @usage: $this->mongo_db->get_where('foo', array('name' => 'tom'))->order_by(array("age" => 1));
	 */
	public function order_by($fields = array()) {
		foreach($fields as $col => $val) {
			if ($val == -1 || $val == false || strtolower($val) == "desc") {
				$this->sorts[$col] = -1;
			} else {
				$this->sorts[$col] = 1;
			}
		}
		return($this);
	}
	
	/**
	 * limit
	 *
	 * @usage: $this->mongo_db->get_where('foo', array('name' => 'tom'))->limit(10);
	 */
	public function limit($x = 999999) {
		if ($x !== NULL && is_numeric($x) && $x >= 1) {
			$this->limit = (int)$x;
		}
		return($this);
	}
	
	/**
	 * offset
	 *
	 * @usage: $this->mongo_db->get_where('foo', array('name' => 'tom'))->offset(10);
	 */
	public function offset($x = 0) {
	 	if($x !== NULL && is_numeric($x) && $x >= 1) {
	 		$this->offset = (int) $x;
	 	}
	 	return($this);
	}
	
	/**
	 *  get_where
	 * 
	 *  @usage: $this->mongo_db->get_where('foo', array('bar' => 'something'));
	 */
	public function get_where($collection = "", $where = array(), $limit = 999999) {
		return($this->where($where)->limit($limit)->get($collection));
	}
	
	/**
	 *  get
	 *
	 *  @usage: $this->mongo_db->where(array('name' => 'tom'))->get('foo');
	 */
	public function get($collection) {
		if (empty($collection)) {
			$this->log_error("In order to retreive documents from MongoDB, a collection name must be passed");
			exit;
		}
		$results = array();
		$results = $this->db->{$collection}->find($this->wheres, $this->selects)->limit((int)$this->limit)->skip((int)$this->offset)->sort($this->sorts);
		
		$returns = array();
		
		foreach($results as $result) {
			$returns[] = $result;
		}
		
		$this->clear();
		
		return($returns);
	}
	
	/**
	 *  count
	 *
	 *  @usage: $this->db->get_where('foo', array('name' => 'tom'))->count('foo'); 
	 */
	public function count($collection) {
		if (empty($collection)) {
			$this->log_error("In order to retreive documents from MongoDB, a collection name must be passed");
			exit;
		}
		
		$count = $this->db->{$collection}->find($this->wheres)->limit((int)$this->limit)->skip((int)$this->offset)->count();
		$this->clear();
		return($count);
	}
	
	/**
	 *  insert
	 *
	 *  @usage: $this->mongo_db->insert('foo', array('name' => 'tom'));
	 */
	public function insert($collection = "", $data = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection selected to delete from");
			exit;
		}
		
		if (count($data) == 0 || ! is_array($data)) {
			$this->log_error("Nothing to insert into Mongo collection or insert is not an array");
			exit;
		}
		
		try {
			$this->db->{$collection}->insert($data, array('fsync' => true));
			if (isset($data['_id'])) {
				return($data['_id']);
			} else {
				return(false);
			}
		} catch(MongoCursorException $e) {
			$this->log_error("Insert of data into MongoDB failed: {$e->getMessage()}");
			exit;
		}
	}
	
	/**
	 *  update : 利用MongoDB的 $set 实现
	 *
	 *  @usage : $this->mongo_db->where(array('name' => 'tom'))->update('foo', array('age' => 24))
	 */
	public function update($collection = "", $data = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection selected to delete from");
			exit;
		}
		
		if (count($data) == 0 || ! is_array($data)) {
			$this->log_error("Nothing to update in Mongo collection or update is not an array");
			exit;
		}
		
		try {
			$this->db->{$collection}->update($this->wheres, array('$set' => $data), array('fsync' => true, 'multiple' => false));  //注意: multiple为false
			return(true);
		} catch(MongoCursorException $e) {
			$this->log_error("Update of data into MongoDB failed: {$e->getMessage()}");
			exit;
		}
	}
	
	/**
	 *  update_all : 利用MongoDB的 $set 实现
	 *
	 *  @usage : $this->mongo_db->where(array('name' => 'tom'))->update_all('foo', array('age' => 24));
	 */
	public function update_all($collection = "", $data = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection selected to delete from");
			exit;
		}
		
		if (count($data) == 0 || ! is_array($data)) {
			$this->log_error("Nothing to update in Mongo collection or update is not an array");
			exit;
		}
		
		try {
			$this->db->{$collection}->update($this->wheres, array('$set' => $data), array('fsync' => true, 'multiple' => true));  //注意: multiple为true
			return(true);
		} catch(MongoCursorException $e) {
			$this->log_error("Update of data into MongoDB failed: {$e->getMessage()}");
			exit;
		}
	}
	
	/**
	 *  delete 
	 *
	 *  @usage : $this->mongo_db->where(array('name' => 'tom'))->delete('foo');
	 */
	public function delete($collection = "") {
		if (empty($collection)) {
			$this->log_error("No Mongo collection selected to delete from");
			exit;
		}
		
		try {
			$this->db->{$collection}->remove($this->wheres, array('fsync' => true, 'justOne' => true)); //注意justOne为true;
		} catch(MongoCursorException $e) {
			$this->log_error("Delete of data into MongoDB failed: {$e->getMessage()}");
			exit;
		}
	}	
	
	/**
	 *  delete_all
	 *
	 *  @usage : $this->mongo_db->where(array('name' => 'tom'))->delete_all('foo');
	 */
	public function delete_all($collection = "") {
		if (empty($collection)) {
			$this->log_error("No Mongo collection selected to delete from");
			exit;
		}
		
		try {
			$this->db->{$collection}->remove($this->wheres, array('fsync' => true, 'justOne' => false)); //注意justOne为false;
		} catch(MongoCursorException $e) {
			$this->log_error("Delete of data into MongoDB failed: {$e->getMessage()}");
			exit;
		}
	}
	
	/** 
	 * add_index
	 *
	 * @usage : $this->mongo_db->add_index('foo', array('first_name' => 'ASC', 'last_name' => -1), array('unique' => true)));
	 */
	public function add_index($collection, $keys = array(), $options = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection specified to add index to");
			exit;
		}
		
		if (empty($keys) || ! is_array($keys)) {
			$this->log_error("Index could not be created to MongoDB Collection because no keys were specified");
			exit;
		}
		
		foreach($keys as $col => $val) {
			if ($val == -1 || $val == false || strtolower($val) == 'desc') {
				$keys[$col] = -1;
			} else {
				$keys[$col] = 1;
			}
		}
		
		//在此没有对$options数组的有效性进行验证
		
		if (true == $this->db->{$collection}->ensureIndex($keys, $options)) {
			$this->clear();
			return($this);
		} else {
			$this->log_error("An error occured when trying to add an index to MongoDB Collection");
			exit;
		}
	}
	
	/**
	 * remove_index
	 *
	 * @usage : $this->mongo_db->remove_index('foo', array('first_name' => 'ASC', 'last_name' => -1))
	 */
	public function remove_index($collection = "", $keys = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection specified to add index to");
			exit;
		}
		
		if (empty($keys) || ! is_array($keys)) {
			$this->log_error("Index could not be created to MongoDB Collection because no keys were specified");
			exit;
		}
		
		if ($this->db->{$collection}->deleteIndex($keys)) {
			$this->clear();
			return($this);
		} else {
			$this->log_error("An error occured when trying to add an index to MongoDB Collection");
			exit;
		}
	}
	
	/**
	 * remove_all_index
	 *
	 * @usage : $this->mongo_db->remove_all_index('foo', array('first_name' => 'ASC', 'last_name' => -1))
	 */
	public function remove_all_index($collection = "", $keys = array()) {
		if (empty($collection)) {
			$this->log_error("No Mongo collection specified to add index to");
			exit;
		}
		
		if (empty($keys) || ! is_array($keys)) {
			$this->log_error("Index could not be created to MongoDB Collection because no keys were specified");
			exit;
		}
		
		if ($this->db->{$collection}->deleteIndexes($keys)) {
			$this->clear();
			return($this);
		} else {
			$this->log_error("An error occured when trying to add an index to MongoDB Collection");
			exit;
		}
	}
	
	/**
	 * list_indexes
	 *
	 * @usage :  $this->mongo_db->list_indexes('foo');
	 */
	public function list_indexes($collection = "") {
		if (empty($collection)) {
			$this->log_error("No Mongo collection specified to add index to");
			exit;
		}
		
		return($this->db->{$collection}->getIndexInfo());
	}
	
	/**
	 * drop_collection
	 *
	 * @usage : $this->mongo_db->drop_collection('foo');
	 */
	public function drop_collection($collection = "") {
		if (empty($collection)) {
			$this->log_error("No Mongo collection specified to add index to");
			exit;
		}
		
		$this->db->{$collection}->drop();
		return(true);
	}
	
	/**
	 * 生成连接MongoDB 参数字符串
	 *
	 */
	private function connection_string() {
		include_once($this->mongo_config);
		
		$this->host = trim($config['host']);
		$this->port = trim($config['port']);
		$this->user = trim($config['user']);
		$this->pass = trim($config['pass']);
		
		$this->dbname  = trim($config['dbname']);
		$this->persist = trim($config['persist']);
		$this->persist_key = trim($config['persist_key']);
		
		$connection_string = "mongodb://";
		
		if (empty($this->host)) {
			$this->log_error("The Host must be set to connect to MongoDB");
			exit;
		}
		
		if (empty($this->dbname)) {
			$this->log_error("The Database must be set to connect to MongoDB");
			exit;
		}
		
		if ( ! empty($this->user) && ! empty($this->pass)) {
			$connection_string .= "{$this->user}:{$this->pass}@";
		}
		
		if ( isset($this->port) && ! empty($this->port)) {
			$connection_string .= "{$this->host}:{$this->port}";
		} else {
			$connection_string .= "{$this->host}";
		}
		
		$this->connection_string = trim($connection_string);
	}
	
	/**
	 * 连接MongoDB 获取数据库操作句柄
	 *
	 */
	private function connect() {
		$options = array();
		if (true === $this->persist) {
			$options['persist']  = isset($this->persist_key) && ! empty($this->persist_key) ? $this->persist_key : "ci_mongo_persist";
		}
		
		try {
			$this->connection = new Mongo($this->connection_string, $options);
			$this->db = $this->connection->{$this->dbname};
			return ($this);
		} catch (MongoConnectionException $e) {
			$this->log_error("Unable to connect to MongoDB: {$e->getMessage()}");
		}
	}
	
	/**
	 * 初始化清理部分成员变量
	 * 
	 */
	private function clear() {
		$this->selects = array();
		$this->wheres  = array();
		$this->limit   = NULL;
		$this->offset  = NULL;
		$this->sorts   = array();
	}
	
	/**
	 * 依据字段名初始化处理$wheres数组
	 *
	 */
	private function where_init($param) {
		if ( ! isset($this->wheres[$param])) {
			$this->wheres[$param] = array();
		}
	}
	
	/**
	 * 错误记录
	 *
	 */
	private function log_error($msg) {
		$msg = "[Date: ".date("Y-m-i H:i:s")."] ".$msg;
		@file_put_contents("./error.log", print_r($msg."\n", true), FILE_APPEND);
	}
}

/* End of MyMongo.php */