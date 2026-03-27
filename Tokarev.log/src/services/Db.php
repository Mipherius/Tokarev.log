<?php

namespace src\services;

class Db{
    public $pdo;
    private static $instance;

    private function __construct(){
        $db_options = (require __DIR__ . '/../config/settings.php')['db'];
        $this->pdo = new \PDO(
            'mysql:host=' . $db_options['host'] . ';dbname=' . $db_options['dbname'],
            $db_options['user'],
            $db_options['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function query(string $sql, $params = [], string $className = 'stdClass'):  ? array{
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if(false === $result){
            return null;
        } else{
            return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }
    }
}












