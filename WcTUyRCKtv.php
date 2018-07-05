<?php
/*
 * Database Class
 * This class is used for database related (connect, get, insert, update, and delete) operations
 * with PHP Data Objects (PDO)
 * @author    Kushagra Gupta - ecommroof.com
 * @url       http://www.ecommroof.com
 */

class DB {
    // PROD Database credentials
    private $dbHost     = 'localhost';
    private $dbUsername = 'fber2018';
    private $dbPassword = 'D2@hUbF%yon!';
    private $dbName     = 'fber2018';
    public $db;

    /*
     * Connect to the database and return db connecction
     */
    public function __construct() {
        if(!isset($this->db)) {
            // Connect to the database
            try {
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            } catch(PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data) {
        if(!empty($data) && is_array($data)) {
            $columns = '';
            $values  = '';
            $i = 0;
            if(!array_key_exists('creation_date',$data)) {
                $data['creation_date'] = date("Y-m-d H:i:s");
            }

            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            try {
                $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
                $query = $this->db->prepare($sql);

                foreach($data as $key=>$val) {
                    $val = htmlspecialchars(strip_tags($val, "<script><p><b><em><a><s><strong><ul><ol><li><blockquote><div><span><h1><h2><h3><h4><h5><h6><pre><hr/><big><tt><code><table><tbody><thead><tr><th><td><kbd><samp><var><del><ins><cite><q><img>"));
                    $query->bindValue(':'.$key, $val);
                }

                $insert = $query->execute();
                if($insert) {
                    $data['id'] = $this->db->lastInsertId();
                    $data['db_status'] = "OK";
                } else {
                    $data['db_status'] = "NOT OK" . $this->db->error;
                }
            } catch(Exception $e) {
                $data['db_status'] = "DB Error: " . $e;
            }

            return $data;
        } else {
            return false;
        }
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = array()) {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        if(array_key_exists("like",$conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['like'] as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." LIKE '%".$value."%'";
                $i++;
            }
        }

        if(array_key_exists("order_by",$conditions)) {
            $sql .= ' ORDER BY '.$conditions['order_by'];
        }

        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)) {
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)) {
            $sql .= ' LIMIT '.$conditions['limit'];
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all') {
            switch($conditions['return_type']) {
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        } else {
            if($query->rowCount() > 0) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return !empty($data)?$data:false;
    }

    /*
     * Returns rows from the database based on the SQL command
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRowsBySQLCommand($sql) {
        $query = $this->db->prepare($sql);
        $query->execute();

        if($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return !empty($data)?$data:false;
    }

    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table, $data, $conditions) {
        if(!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            if(!array_key_exists('last_updated_date', $data)) {
                $data['last_updated_date'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val) {
                $pre = ($i > 0)?', ':'';
                $val = htmlspecialchars(strip_tags($val, "<p><b><em><a><s><strong><ul><ol><li><blockquote><div><span><h1><h2><h3><h4><h5><h6><pre><hr/><big><tt><code><table><tbody><thead><tr><th><td><kbd><samp><var><del><ins><cite><q><img>"));
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions) && is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value) {
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update?$query->rowCount():false;
        }else{
            return false;
        }
    }
}
?>
