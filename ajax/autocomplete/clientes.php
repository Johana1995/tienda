<?php
require_once "../../libs/DataBase.php";
if (isset($_GET['term'])){

$return_arr = array();
    $db= DataBase::singleton();
    $sql = "SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,c.id as cliente_id,c.nit
            from persona p, cliente c
            WHERE p.id=c.persona_id and p.nombre like '%" . $_GET['term'] . "%' LIMIT 0 ,10";
    $query = $db->prepare($sql);
    $query->execute();
    $clientes= $query->fetchAll(PDO::FETCH_OBJ);

	/* Retrieve and store in array the results of the query.*/
	foreach ($clientes as $row):
		$id_cliente=$row->cliente_id;
		$row_array['value'] = $row->nombre;
		$row_array['id_cliente']=$id_cliente;
		$row_array['nombre_cliente']=$row->nombre;
		$row_array['telefono_cliente']=$row->nit;
		$row_array['email_cliente']=$row->direccion;
		array_push($return_arr,$row_array);
    endforeach;
echo json_encode($return_arr);

}
?>