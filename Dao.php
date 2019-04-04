<?php
    mysql://bdb3dd3c5ad4b1:ec474796@us-cdbr-iron-east-03.cleardb.net/heroku_45fb7d407a198a1?reconnect=true
    class Dao {
        private $host = "us-cdbr-iron-east-03.cleardb.net";
        private $db = "heroku_45fb7d407a198a1";
        private $user = "bdb3dd3c5ad4b1";
        private $pass = "ec474796";
        public function getConnection () {
            return
            new PDO("mysql:host={this->host};dbname={this->db}")
        }
    }
?>
