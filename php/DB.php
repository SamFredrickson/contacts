<?php

class DB{

    private $instance = null;
    private $errors   = array();

    public function __construct(){
        try{
            $this->instance = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
            $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            print "Ошибка при установления соеденения: " . $e->getMessage(); 
        }
    }

    public function select($table, $cond = null, $value = null){
        if($cond === null || $value === null){
           $q = $this->instance->query("SELECT * FROM $table");
           $rows = $q->fetchAll();
        }else{
            $q = $this->instance->query("SELECT * FROM $table WHERE $cond $value");
            $rows = $q->fetchAll();
        }

        return $rows;
    }

    public function delete($table, $id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->instance->exec("DELETE FROM $table WHERE id = $id");
       }
    }

    public function insert($table, $name, $phone){
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $stmt = $this->instance->prepare("INSERT INTO $table (naming, phone) VALUES (?, ?)");
            $stmt->execute([$name, $phone]);
       }
       
       
    }
}