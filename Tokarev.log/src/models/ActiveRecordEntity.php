<?php
namespace src\models;
use src\services\Db;

abstract class ActiveRecordEntity{
    protected $ID;

    public function getID(): int{
        return $this->ID;
    }
    public static function findAll(): array{
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    public static function getById($id): ?self{
        $db = Db::getInstance();
        $entities = $db->query('SELECT * FROM `' . static::getTableName() . '` WHERE id = :id;' , [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }
    public function save(){
        $properties = $this->getReflectorProperties();
        if($this->ID !== null){
            $this->update($properties);
        } else{
            $this->insert($properties);
        }
    }
    public function getReflectorProperties(): array{
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $resultProperties = [];
        foreach($properties as $property){
            $propertyName = $property->getName();
            $resultProperties[$propertyName] = $this->$propertyName; 
        }
        return $resultProperties;
    }
    public function update($properties){
        $columns2params = [];
        $columns2values = [];
        $index = 1;
        foreach($properties as $column => $value){
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $columns2values[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->ID;
        $db = Db::getInstance();
        $db->query($sql, $columns2values, static::class);
    }
    public function insert($properties){
        $filteredProperties = array_filter($properties);
        $columns = [];
        $paramsNames = [];
        $params2values = []; //ассоциативный массив параметр -> значение
        foreach($filteredProperties as $columnName => $value){
            $columns[] = '`' . $columnName . '`';
            $paramsName = ':' . $columnName;
            $paramsNames[] = $paramsName;
            $params2values[$paramsName] = $value;
        }
        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $paramsNames) . ');';
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }
    abstract protected static function getTableName(): string;
    
}