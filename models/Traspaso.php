<?php

class Traspaso extends Model
{
    public $id;
    public $numero;
    public $fechahora;
    public $emisor;
    public $receptor;

    const table='traspaso';


    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Traspaso');
    }

}