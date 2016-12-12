<?php

class User  extends Model
{
    public $persona_id;
    public $empleado_id;
    public $nombre;
    public $cargo_id;
    public $cargo;
    public $sucursal;
    public $caja;

    private static $instance = null;
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION)) { session_start(); }
        if (!$this->load())
        {
            $this->empleado_id = null;
        }
    }
    private function load()
    {
        $validador = false;
        if(isset($_SESSION['empleado_id']) )
        {
            $empleado_id=$_SESSION['empleado_id'];
            $sql = 'SELECT e.id as empleado_id,e.persona_id as persona_id,p.nombre as nombre,
                      c.id as cargo_id, c.nombre as cargo
                    from empleado e, cargo c , persona p
                    WHERE e.rol_id=c.id and p.id=e.persona_id and e.id=?';
            $query = $this->db->prepare($sql);
            $query->execute([$empleado_id]);
            if($result = $query->fetch(PDO::FETCH_OBJ))
            {
                $this->persona_id = $result->persona_id;
                $this->empleado_id = $result->empleado_id;
                $this->nombre = $result->nombre;
                $this->cargo_id= $result->cargo_id;
                $this->cargo=$result->cargo;
                $this->sucursal=$_SESSION['sucursal'];
                $this->caja=$_SESSION['caja'];
                $validador =true;
            }
        }
        return $validador;
    }
    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new User();
        return self::$instance;
    }
    public function esEmpleado()
    {
        return isset($this->empleado_id);
    }
    public function sucursal(){
        $sql = 'SELECT * FROM sucursal ';
        $sql .= ' where id = ?';
        $params = [$this->sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $suc = $query->fetch(PDO::FETCH_OBJ);
        return $suc->nombre;
    }
    public function caja(){
        $sql = 'SELECT * FROM caja ';
        $sql .= ' where id = ?';
        $params = [$this->caja];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $caj = $query->fetch(PDO::FETCH_OBJ);
        return $caj->numero;
    }
    public function rol()
    {
        if(isset($this->cargo_id))
        return $this->cargo;
        else
            return 'SINCARGO';
    }
    public function login( $username, $password,$sucursal,$caja)
    {
        $sql = 'SELECT e.id as empleado_id,e.persona_id as persona_id,p.nombre as nombre,
              c.id as cargo_id, c.nombre as cargo
            from empleado e, cargo c , persona p
            WHERE e.rol_id=c.id and p.id=e.persona_id and e.username=? and e.password=?';
        $params = [$username,$password];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        if($user = $query->fetch(PDO::FETCH_OBJ))
        {
            $_SESSION['empleado_id'] = $user->empleado_id;
            $this->persona_id = $user->persona_id;
            $this->empleado_id = $user->empleado_id;
            $this->nombre = $user->nombre;
            $this->cargo_id= $user->cargo_id;
            $this->cargo=$user->cargo;
            $_SESSION['sucursal']=$sucursal;
            $this->sucursal=$sucursal;
            $_SESSION['caja']=$caja;
            $this->caja=$caja;
            return true;
        }
        return false;
    }
    public static function logout()
    {
        if (!isset($_SESSION)) { session_start(); }
        unset($_SESSION['empleado_id']);
        unset($_SESSION['sucursal']);
        unset($_SESSION['caja']);
    }
    public function isLogin()
    {
        return isset($this->empleado_id);
    }
}