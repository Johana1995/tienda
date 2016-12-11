<?php

class Persona extends Model
{
    public $id;


    const table='empleado';
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
    public function update()
    {
        try {
            $sql = 'UPDATE empleado SET apellido=?, nombre=?,direccion=?,nacimiento=?,genero_id=?';
            $sql .= ' WHERE id=?';
            $params = [$this->apellido,$this->nombre,$this->direccion,$this->nacimiento,$this->genero_id,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function findById($id)
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql .= ' where id = ?';
        $params = [$id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Persona');
        return $query->fetch();
    }
}