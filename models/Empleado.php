<?php

class Empleado extends Model
{

    public $empleado_id;
    public $correo;
    public $username;
    public $password;
    public $rol_id;
    public $rol;

    public $persona_id;
    public $apellido;
    public $nombre;
    public $direccion;
    public $nacimiento;
    public $genero_id;
    public $genero;

    const table='empleado';
    public function listar()
    {
        $sql = 'SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,
                  e.id as empleado_id,e.correo,e.username , e.password,e.rol_id,g.descripcion as genero,c.nombre as cargo
                from persona p, empleado e,genero g,cargo c
                WHERE p.id=e.persona_id and g.id=p.genero_id and c.id=e.rol_id';
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

                $sql = 'INSERT INTO empleado (persona_id,correo,username,password,rol_id)';
                $sql .= ' VALUES (?,?,?,?,?)';
                $params = [$persona,$this->correo,$this->username,$this->password,$this->rol_id];
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
            $sql = 'UPDATE empleado SET correo=?, username=?,password=?,rol_id=?';
            $sql .= ' WHERE id=?';
            $params = [$this->correo,$this->username,$this->password,$this->rol_id,$this->persona_id];
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
          e.id as empleado_id,e.correo,e.username , e.password,e.rol_id,g.descripcion as genero,c.nombre as cargo
          from persona p, empleado e,genero g,cargo c
          WHERE p.id=e.persona_id and g.id=p.genero_id and c.id=e.rol_id and e.id=?';
        $params = [$id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
        return $query->fetch();
    }
    public function eliminar(){
        try {
            $sql = 'DELETE FROM '.self::table;
            $sql .= ' WHERE id=?';
            $params = [$this->empleado_id];
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