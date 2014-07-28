<?php
            interface ICommonDAO {
                 public function openConnection();
                 public function closeConnection();
                 public function executeQuery($query);
                 public function getTotalRows($resultSet);
                 public function selectAll($tableName);
                 public function fetchAllArray($query,$assoc = true);
                 public function freeResultSet($resultSet);
                 public function fetchObjectQuery($resultSet);
                 public function fetchArrayQuery($resultSet);
                 public function executeInsertQuery($table=null,$array_of_values=array());
                 public function rollBackTransaction();
                 public function commitTrasaction();
                 public function setAutoCommitFalseTrasaction();
                 public function getLastInsertedId();
            } 
            
            abstract class CommonDAO implements ICommonDAO{
                
                 const hostName = LOCALHOST;
		 const userName = USERNAME;	
	         const password = PASSWORD;
		 const dbName   = DBNAME; 
                 
                 private $link;
                 private $query;
                 private $error;
                 
                // open database
                protected function connect() {
                    
                   if ($this -> link =mysqli_connect(CommonDAO::hostName, CommonDAO::userName, CommonDAO::password)){
                        // Check connection
                        if (mysqli_connect_errno()){
                              $this -> exception("Could not connect to the database!". mysqli_connect_error());
                         }
                         if (!mysqli_select_db($this -> link,CommonDAO::dbName)){
                               $this -> exception("Could not connect to the database!");
                         }
                        return $this -> link; 
                   }else{
                       $this -> exception("Could not create database connection!");
                   }
                }
                // close database
                protected function close() {
                    @mysqli_close($this->link);
                    $this -> link = NULL;
                    $this -> query = NULL;
                }
                // execute query
                protected function query($sql) {
                        if ($this->query = @mysqli_query($this->link,$sql)) {
                            return $this->query;
                        } else {
                            $this->exception("Could not query database!");
                            return false;
                        }
                }
                // get total number query
                protected function num_rows($qid) {
                    if (empty($qid)) {          
                        $this->exception("Could not get number of rows because no query id was supplied!");
                        return false;
                    } else {
                        return mysqli_num_rows($qid);
                    }
                }
                protected function fetch_array($qid) {
                    if (empty($qid)) {
                        $this->exception("Could not fetch array because no query id was supplied!");
                        return false;
                    } else {
                        $data = mysqli_fetch_array($qid);
                    }
                    return $data;
                }
                protected function fetch_array_assoc($qid) {
                    if (empty($qid)) {
                        $this->exception("Could not fetch array assoc because no query id was supplied!");
                        return false;
                    } else {
                        $data = mysqli_fetch_array($qid, MYSQLI_ASSOC);
                    }
                    return $data;
                }
                protected function fetch_all_array($sql, $assoc = true) {
                        $data = array();
                        if ($qid = $this->query($sql)) {
                            if ($assoc) {
                                while ($row = $this->fetch_array_assoc($qid)) {
                                    $data[] = $row;
                                }
                            } else {
                                while ($row = $this->fetch_array($qid)) {
                                    $data[] = $row;
                                }
                            }
                        } else {
                            return false;
                        }
                        return $data;
                    }
                // get Last Id
                protected function last_id() {
                        if ($id = mysqli_insert_id($this->link)) {
                            return $id;
                        } else {
                            return false;
                        }
               }
               
                protected function exception($message) {
                        if ($this->link) {
                            $this->error = mysqli_error($this->link);
                            $this->errno = mysqli_errno($this->link);
                        } else {
                            $this->error = mysqli_error();
                            $this->errno = mysqli_errno();
                        }
                        if (PHP_SAPI !== 'cli') {
                        ?>

                            <div class="alert-bad">
                                <div>
                                    Database Error
                                </div>
                                <div>
                                    Message: <?php echo $message; ?>
                                </div>
                                <?php if (strlen($this->error) > 0): ?>
                                    <div>
                                        <?php echo $this->error; ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    Script: <?php echo @$_SERVER['REQUEST_URI']; ?>
                                </div>
                                <?php if (strlen(@$_SERVER['HTTP_REFERER']) > 0): ?>
                                    <div>
                                        <?php echo @$_SERVER['HTTP_REFERER']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php
                        } else {
                                    echo "MYSQL ERROR: " . ((isset($this->error) && !empty($this->error)) ? $this->error:'') . "\n";
                        };
                    }
                // Free result set
                protected function freeRSSet($result){
                        mysqli_free_result($result);
                    }
                protected function insert($table=null,$array_of_values=array()) {
                        if ($table===null || empty($array_of_values) || !is_array($array_of_values)) return false;
                        $fields=array(); $values=array();
                        foreach ($array_of_values as $id => $value) {
                                $fields[]=$id;
                                if (is_array($value) && !empty($value[0])) $values[]=$value[0];
                                else $values[]="'". mysqli_real_escape_string($this->link,$value)."'";
                        }
                        $s = "INSERT INTO $table (".implode(',',$fields).') VALUES ('.implode(',',$values).')';
                        echo $s;
                        if ($this->query($s)) return mysqli_insert_id($this->link);
                        return false;
                    }
                // Rollback transaction
                protected function rollback(){
                        // Rollback transaction :: TRUE on success. FALSE on failure
                        return mysqli_rollback($this->link);
                    }
                // Commit transaction
                protected function commit(){
                        // Commit transaction :: TRUE on success. FALSE on failure
                        return mysqli_commit($this->link);
                    }
                // Auto Commit False Transaction
                protected function setAutoCommitFalse(){
                         //Turns on or off auto-committing database modifications ::  Set autocommit to off
                        return mysqli_autocommit($this->link,FALSE);
                    }
                   
            } 
            
            class DataBase extends CommonDAO{
                
                public function openConnection() {
                        parent::connect();
                }
                public function __construct() {
                    // open database
                    $this->openConnection();
                }
                public function __destruct() {
                    // close database
                    $this->closeConnection();
                   
                }
                public function closeConnection() {
                        parent:: close();
                }
                public function executeQuery($query) {
                    return parent::query($query);
                }
                public function getTotalRows($resultSet) {
                    return parent::num_rows($resultSet);
                       
                }
                public function selectAll($tableName)  {
                   $query = 'SELECT * FROM '.$tableName;
                   $resultSet = $this ->executeQuery($query);
                   $query = NULL;
                   return $resultSet;
                }
                public function fetchAllArray($query,$assoc = true){
                     return parent::fetch_all_array($query,$assoc);
                }
                public function freeResultSet($resultSet){
                     return parent::freeRSSet($resultSet);
                }
                public function fetchObjectQuery($resultSet){
                     if (empty($resultSet)) {          
                        $this->exception("Could not fetch object of rows because no query id was supplied!");
                        return false;
                      } else {
                        return mysqli_fetch_object($resultSet);
                     }
                }
                public function fetchArrayQuery($resultSet){
                     if (empty($resultSet)) {          
                        $this->exception("Could not fetch arrays of rows because no query id was supplied!");
                        return false;
                      } else {
                        return mysqli_fetch_array($resultSet);
                     }
                }
                public function getAllMysqlClientInfo(){
                     //Returns the MySQL client library version
                     echo mysqli_get_client_info();
                    //Returns statistics about client per-process
                     var_dump(mysqli_get_client_stats());
                     print_r(mysqli_get_client_stats());
                     echo "<br/>";
                    //Returns the MySQL client library version as an integer
                    echo mysqli_get_client_version();
                    echo "<br/>";
                    //Return stats about the client connection:           
                    print_r(mysqli_get_connection_stats($con));
                   // Return the MySQL server hostname and connection type:
                    echo mysqli_get_host_info($con);
                    //Return the MySQL protocol version:
                    echo mysqli_get_proto_info($con);
                    //Return the MySQL server version:
                    echo mysqli_get_server_info($con);
                    //Returns the MySQL server version as an integer
                    echo mysqli_get_server_version($con);

                }
                public function executeInsertQuery($table = null, $array_of_values = array()) {
                        return parent:: insert($table,$array_of_values);
                }
                // Rollback transaction
                public function rollBackTransaction(){
                    // Rollback transaction :: TRUE on success. FALSE on failure
                       return parent:: rollback();
                }
                // Commit transaction
                public function commitTrasaction(){
                       // Commit transaction :: TRUE on success. FALSE on failure
                       return parent::commit();
                   }
                // Auto Commit False Transaction
                public  function setAutoCommitFalseTrasaction(){
                       //Turns on or off auto-committing database modifications ::  Set autocommit to off
                       return parent:: setAutoCommitFalse();
                   }
                
                   
                   
                   
                private $sqlQuery;
                function insertInto($tableName,$values) {
                    $i = NULL;
                    $this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
                    $i = 0;
                    while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL)    {
                        if($values[$i]["type"] == "char")   {
                            $this -> sqlQuery .= "'";
                            $this -> sqlQuery .= $values[$i]["val"];
                            $this -> sqlQuery .= "'";
                        }
                        else if($values[$i]["type"] == 'int')   {
                            $this -> sqlQuery .= $values[$i]["val"];
                        }
                        $i++;
                        if($values[$i]["val"] != NULL)  {
                            $this -> sqlQuery .= ',';
                        }
                    }
                    $this -> sqlQuery .= ')';
                            #echo $this -> sqlQuery;
                    //mysql_query($this -> sqlQuery,$this ->connectionString);
                     return $this -> sqlQuery;
                    #$this -> sqlQuery = NULL;
                }
                
                public function build_sql_insert($table, $data) {
                    $key = array_keys($data);
                    $val = array_values($data);
                    echo implode(', ', $key) ."-----".implode("', '", $val);
                    $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
                         . "VALUES ('" . implode("', '", $val) . "')";

                    return($sql);
                }

                public function getLastInsertedId() {
                    return parent::last_id();
                }
               
                
            }
            /* ------------------------------------------------------ Main Method..............................................*/
           
 ?>