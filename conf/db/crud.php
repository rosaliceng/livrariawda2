<?php
class Crud {
  private $_db;
  private $sql;

  public function __construct() {
    $this->_db = ConnectionDB::getInstance();
  }

  public function getAll($from = "", $orderBy="id", $sort="asc") {
    $this->sql = "select * from ".$from." order by ".$orderBy." ".$sort;

    $query = $this->_db->prepare($this->sql);
		try {
			$query->execute();

			return $query->fetchall(PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			print($e->getMessage());
		}
  }

  public function find($fields = "", $from = "", $condition = "", $sort = "asc", $shouldUseWhere = true) {
    if($shouldUseWhere) {
      $this->sql = "select ".$fields." from ".$from." where ".$condition;
    } else {
      $this->sql = "select ".$fields." from ".$from." ".$condition;
    }

    $query = $this->_db->prepare($this->sql);

    try {
      $query->execute();
      return $query->fetch(PDO::FETCH_OBJ);
    } catch(PDOException $e) {
			print($e->getMessage());
		}
  }

  public function findAll($search = "", $from = "", $fields = []) {
    $sql = "select * from {$from}";
    $fieldsArray = array();
    foreach($fields as $searchtable) {
        $fieldsArray[] = "{$searchtable} like '%{$search}%'";
    }

    $condition = implode(" or ", $fieldsArray);
    $sql .= "(".$condition.")";
    $this->sql = $sql;
    $query = $this->_db->prepare($this->sql);

    try {
      $query->execute();
      return $query->fetchAll(PDO::FETCH_OBJ);
    } catch(PDOException $e) {
			print($e->getMessage());
		}
  }

  public function insert($params = [], $into = "") {
    $this->sql = $this->buildSql("insert into ".$into."(", $params);
    $query  = $this->_db->prepare($this->sql);
    $position = 1;

    foreach($params as $key => $value) {
      $query->bindValue($position, $value);
      $position += 1;
    }

    try {
			$query->execute() or die(var_dump($query));
      echo "{message: 'Registro criado!'}";
		} catch(PDOException $e) {
			die($e->getMessage());
		}
  }

  public function update($params = [], $into = "", $where = "") {
    $this->sql = $this->buildSql("update ".$into, $params, $where, $type = "update");
    $query = $this->_db->prepare($this->sql);

    try {
			$query->execute() or die(var_dump($query));
      echo "{message: 'Registro atualizado!'}";
		} catch(PDOException $e) {
			die($e->getMessage());
		}
  }

  private function buildSql($initialQuery = "", $params = [], $where = "", $type = "") {
    $sql = $initialQuery;

    if($type == "update") {
      $sql .= " set ";
      $target = array();

      foreach ($params as $key => $value) {
        $target[] = "{$key} = '{$value}'";
      }

      $sql .= implode(",",$target);
      $sql .= " where ".$where;
    } else {
      $fieldsArray = array();
      $valuesArray = array();
      foreach ($params as $key => $value) {
      	$fieldsArray[] = $key;
      	$valuesArray[] = "?";
      }
      $fields = implode(",", $fieldsArray);
      $values = implode(",", $valuesArray);
      $sql .= $fields.") values (".$values.")";
    }

    return $sql;
  }
}

$crud = new Crud();
?>
