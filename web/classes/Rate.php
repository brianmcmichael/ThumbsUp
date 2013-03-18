<?php
/**
 * User: Brian
 * Date: 3/18/13
 * Time: 5:31 PM, 3/18/13, 2013
 */
class Rate {
    private $objDb = null;

    private $_dbhost = 'localhost';
    private $_dbname = 'comments';
    private $_dbuser = 'root';
    private $_dbpass = '';

    private $_table_1 = 'comments';
    private $_table_2 = 'ratings';

    public $_user;



    public function __construct($user = null) {
        $this->_user = !empty($user) ? $user : getenv('REMOTE_ADDR');
    }

    private function connect() {
        try {
            $this->objDb = new PDO("mysql:host={$this->_dbhost};dbname={$this->_dbname}",
                $this->_dbuser,
                $this->_dbpass,
                array(
                    PDO::ATTR_PERSISTENT => true
                )
            );
            $this->objDb->exec("SET CHARACTER SET utf8");
        }   catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}