<?php
require 'models/User.php';
$user = User::singleton();
$acciones=[];
if($user->esEmpleado() )
{
    switch ($user->rol())
    {
        case 'ADMINISTRADOR':
            switch ($controllerName) {
                case 'ProductoController':
                    $acciones = ['indexAction', 'createAction', 'editAction',
                        'imagenAction', 'deleteImageAction', 'eliminarImagenAction',
                    'uploadAction',];
                    break;
                case 'EmpleadoController':
                    $acciones = ['indexAction', 'createAction', 'editAction','deleteAction',];
                    break;
                case 'CargoController':
                    $acciones = ['indexAction', 'createAction', 'editAction','deleteAction',];
                    break;
                case 'ClienteController':
                    $acciones = ['indexAction', 'createAction', 'editAction','deleteAction',];
                    break;
                case 'SucursalController':
                    $acciones = ['indexAction', 'createAction', 'viewAction','deleteAction',
                    'productsAction','addProductsAction','deleteProductsAction','stockAction',
                    ];
                    break;
                case 'VentaController':
                    $acciones = ['indexAction', 'createAction', 'viewAction','deleteAction','clearTempAction',
                        'productsAction','addProductsAction','deleteProductsAction','saveAction',
                    ];
                    break;
                case 'ReporteController':
                    $acciones = ['indexAction','empleadosAction','ventasAction','productosAction',
                    ];
                    break;
                case 'SiteController':
                    $acciones = ['indexAction', 'logoutAction',];
                    break;
                case 'CompraController':
                    $acciones = ['indexAction', 'createAction', 'viewAction','deleteAction','clearTempAction',
                        'productsAction','addProductsAction','deleteProductsAction','saveAction',
                    ];
                    break;
                case 'TraspasoController':
                    $acciones = ['indexAction', 'createAction', 'viewAction','clearTempAction', ];
                    break;
            }
             if(!in_array($actionName,$acciones))
                {
                    $controllerName = '';
                    $actionName = '';
                }
        break;

        case 'VENDEDOR':
            switch ($controllerName){
                case 'SiteController':
                    $acciones = ['indexAction', 'logoutAction',];
                    break;
            }
            if(!in_array($actionName,$acciones))
            {
                $controllerName = '';
                $actionName = '';
            }
        break;
        default:
            $controllerName = '';
            $actionName = '';
            break;
    }
    if($controllerName=='' and $actionName=='')
    {
        $actionName='indexAction';
        $controllerName='SiteController';
    }

}
else{

    if($controllerName!='SiteController' and $actionName!='loginAction')
    {
        $actionName='loginAction';
        $controllerName='SiteController';
    }
}
