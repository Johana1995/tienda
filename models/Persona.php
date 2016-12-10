<?php

class Persona extends Model
{
    public $id;
    public $apellido;
    public $nombre;
    public $direccion;
    public $nacimiento;
    public $genero_id;

    const table='persona';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Persona');
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (apellido,nombre,direccion,nacimiento,genero_id)';
        $sql .= ' VALUES(?,?,?,?,?)';
        $params = [$this->apellido,$this->nombre,$this->direccion,$this->nacimiento,$this->genero_id];
        $query = $this->db->prepare($sql);
        if($query->execute($params))
            return $this->db->lastInsertId();
        else
            return null;
    }
}