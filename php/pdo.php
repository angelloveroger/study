<?php



class DPDO{
  private $DSN;
  private $DBUser;
  private $DBPwd;
  private $longLink;
  private $pdo;
  
  //私有构造函数 防止被直接实例化
  private function __construct($dsn, $DBUser, $DBPwd, $longLink = false) {
    $this->DSN = $dsn;
    $this->DBUser = $DBUser;
    $this->DBPwd = $DBPwd;
    $this->longLink = $longLink;
    $this->connect();
  }
 
  //私有 空克隆函数 防止被克隆
  private function __clone(){}
  
  //静态 实例化函数 返回一个pdo对象
  static public function instance($dsn, $DBUser, $DBPwd, $longLink = false){
    static $singleton = array();//静态函数 用于存储实例化对象
    $singIndex = md5($dsn . $DBUser . $DBPwd . $longLink);
    if (empty($singleton[$singIndex])) {
      $singleton[$singIndex] = new self($dsn, $DBUser, $DBPwd, $longLink = false);
    }
    return $singleton[$singIndex]->pdo;
  }
    
  private function connect(){
    try{
      if($this->longLink){
        $this->pdo = new PDO($this->DSN, $this->DBUser, $this->DBPwd, array(PDO::ATTR_PERSISTENT => true));
      }else{
        $this->pdo = new PDO($this->DSN, $this->DBUser, $this->DBPwd);
      }
      $this->pdo->query('SET NAMES UTF-8');
    } catch(PDOException $e) {
      die('Error:' . $e->getMessage() . '<br/>');
    }
  }

  //字段关联数组处理， 主要用于写入和更新数据、同and 或 or 的查询条件，产生sql语句和映射字段的数组
  public function FDFields($data, $link = ',', $judge = array(), $aliasTable = ''){
    $sql = '';
    $mapData = array();
    foreach($data as $key => $value) {
      $mapIndex = ':' . ($link != ',' ? 'c' : '') . $aliasTable . $key;
      $sql .= ' ' . ($aliasTable ? $aliasTable . '.' : '') . '`' . $key . '` ' . ($judge[$key] ? $judge[$key] : '=') . ' ' . $mapIndex . ' ' . $link;
      $mapData[$mapIndex] = $value;
    }
    $sql = trim($sql, $link);
    return array($sql, $mapData);
  }
  //用于处理单个字段处理
  public function FDField($field, $value, $judge = '=', $preMap = 'cn', $aliasTable = '') {
    $mapIndex = ':' . $preMap . $aliasTable . $field;
    $sql = ' ' . ($aliasTable ? $aliasTable . '.' : '') . '`' . $field . '`' . $judge . $mapIndex;
    $mapData[$mapIndex] = $value;
    return array($sql, $mapData);
  }
  //使用刚方法可以便捷产生查询条件及对应数据数组
  public function FDCondition($condition, $mapData) {
    if(is_string($condition)) {
        $where = $condition;
    } else if (is_array($condition)) {
      if($condition['str']) {
        if (is_string($condition['str'])) {
          $where = $condition['str'];
        } else {
          return false;
        }
      }
      if(is_array($condition['data'])) {
        $link = $condition['link'] ? $condition['link'] : 'and';
        list($conSql, $mapConData) = $this->FDFields($condition['data'], $link, $condition['judge']);
        if ($conSql) {
          $where .= ($where ? ' ' . $link : '') . $conSql;
          $mapData = array_merge($mapData, $mapConData);
        }
      }
    }
    return array($where, $mapData);
  }

  public function fetch($sql, $searchData = array(), $dataMode = PDO::FETCH_ASSOC, $preType = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)) {
    if ($sql) {
      $sql .= ' limit 1';
      $pdoStatement = $this->pdo->prepare($sql, $preType);
      $pdoStatement->execute($searchData);
      return $data = $pdoStatement->fetch($dataMode);
    } else {
      return false;
    }
  }
    
  public function fetchAll($sql, $searchData = array(), $limit = array(0, 10), $dataMode = PDO::FETCH_ASSOC, $preType = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)) {
    if ($sql) {
      $sql .= ' limit ' . (int) $limit[0] . ',' . (intval($limit[1]) > 0 ? intval($limit[1]) : 10);
      $pdoStatement = $this->pdo->prepare($sql, $preType);
      $pdoStatement->execute($searchData);
      return $data = $pdoStatement->fetchAll($dataMode);
    } else {
      return false;
    }
  }
    
  public function insert($tableName, $data, $returnInsertId = false, $replace = false) {
    if(!empty($tableName) && count($data) > 0){
      $sql = $replace ? 'REPLACE INTO ' : 'INSERT INTO ';
      list($setSql, $mapData) = $this->FDFields($data);
      $sql .= $tableName . ' set ' . $setSql;
      $pdoStatement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $execRet = $pdoStatement->execute($mapData);
      return $execRet ? ($returnInsertId ? $this->pdo->lastInsertId() : $execRet) : false;
    } else {
      return false;
    }
  }
    
  public function update($tableName, $data, $condition, $mapData = array(), $returnRowCount = true) {
    if(!empty($tableName) && count($data) > 0) {
      $sql = 'UPDATE ' . $tableName . ' SET ';
      list($setSql, $mapSetData) = $this->FDFields($data);
      $sql .= $setSql;
      $mapData = array_merge($mapData, $mapSetData);
      list($where, $mapData) = $this->FDCondition($condition, $mapData);
      $sql .= $where ? ' WHERE ' . $where : '';
      $pdoStatement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $execRet = $pdoStatement->execute($mapData);
      return $execRet ? ($returnRowCount ? $pdoStatement->rowCount() : $execRet) : false;
    } else {
      return false;
    }
  }

  public function delete($tableName, $condition, $mapData = array()) {
    if(!empty($tableName) && $condition){
      $sql = 'DELETE FROM ' . $tableName;
      list($where, $mapData) = $this->FDCondition($condition, $mapData);
      $sql .= $where ? ' WHERE ' . $where : '';
      $pdoStatement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $execRet = $pdoStatement->execute($mapData);
      return $execRet;
    }
  }
}