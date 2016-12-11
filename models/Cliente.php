<?php

class Cliente extends Model
{

    public $cliente_id;
    public $nit;
    public $fecha_creacion;
    public $tipo_id;
    public $tipo;

    public $persona_id;
    public $apellido;
    public $nombre;
    public $direccion;
    public $nacimiento;
    public $genero_id;
    public $genero;

    const table='cliente';
    public function listar()
    {
        $sql = 'SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,
            c.id as cliente_id,c.nit,c.fecha_creacion , c.tipo_id,g.descripcion as genero,t.descripcion as tipo
            from persona p, cliente c,genero g,tipo_cliente t
            WHERE p.id=c.persona_id and g.id=p.genero_id and t.id=c.tipo_id;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function crear()
    {
        $persona=null;
        try {
            $sql = 'INSERT INTO persona (apellido,nombre,direccion,nacimiento,genero_id)';
            $sql .= ' VALUES (?,?,?,?,?)';
            $params = [$this->apellido,$this->nombre,$this->direccion,$this->nacimiento,$this->genero_id];
            $query = $this->db->prepare($sql);

            if(!$query->execute($params)) {
                return null;
            }
            $persona= $this->db->lastInsertId();
            $sql=null;$params=null;$query=null;

                $sql = 'INSERT INTO cliente (persona_id,nit,fecha_creacion,tipo_id)';
                $sql .= ' VALUES (?,?,?,?)';
                $params = [$persona,$this->nit,$this->fecha_creacion,$this->tipo_id];
                $query = $this->db->prepare($sql);
                $query->execute($params);
                return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function update()
    {
        try {
            $sql = 'UPDATE persona SET apellido=?, nombre=?,direccion=?,nacimiento=?, genero_id=?';
            $sql .= ' WHERE id=?';
            $params = [$this->apellido,$this->nombre,$this->direccion,$this->nacimiento,$this->genero_id,$this->persona_id];
            $query = $this->db->prepare($sql);
            if(! $query->execute($params))
                return null;

            $sql=null;$params=null;$query=null;
            $sql = 'UPDATE persona SET nit=?, fecha_creacion=?,tipo_id=?';
            $sql .= ' WHERE id=?';
            $params = [$this->nit,$this->fecha_creacion,$this->tipo_id];
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
        $sql = 'SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,
            c.id as cliente_id,c.nit,c.fecha_creacion , c.tipo_id,g.descripcion as genero,t.descripcion as tipo
            from persona p, cliente c,genero g,tipo_cliente t
            WHERE p.id=c.persona_id and g.id=p.genero_id and t.id=c.tipo_id and c.id=?;';
        $params = [$id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function eliminar(){
        try {
            $sql = 'DELETE FROM '.self::table;
            $sql .= ' WHERE id=?';
            $params = [$this->cliente_id];
            $query = $this->db->prepare($sql);
            if($query->execute($params))
            {
                $sql=null;$params=null;$query=null;
                $sql = 'DELETE FROM persona';
                $sql .= ' WHERE id=?';
                $params = [$this->persona_id];
                $query = $this->db->prepare($sql);
                $query->execute($params);
                return ($query->rowCount() != 0);
            }

        }catch ( PDOException $e)
        {
            return false;
        }
    }

}