<?php
/**
 * Created by PhpStorm.
 * User: SLC
 * Date: 27.10.2017
 * Time: 23:18
 */

class CreateBD extends mysqli {
    private $hostt = "localhost";
    private $dbnamee = "task1_users";
    private $username = "root";
    private $password = "";


    function __construct() {
        parent::__construct($host = $this->hostt, $username = $this->username, $password = $this->password,
            $dbname = $this->dbnamee);
    }


}
$conn = new CreateBD();