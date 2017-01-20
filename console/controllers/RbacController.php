<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "calificar" permission
        $calificar = $auth->createPermission('calificar');
        $calificar->description = 'calificar especialidad y proyectos';
        $auth->add($calificar);
        
        // add "comentar" permission
        $comentar = $auth->createPermission('comentar');
        $comentar->description = 'comentar especialidad y proyectos';
        $auth->add($comentar);

        // add "administrar" permission
        $adm = $auth->createPermission('administrar');
        $adm->description = 'administracion del sitio';
        $auth->add($adm);

        // add "cliente" role and give this role the "calificar" y  "comentar" permission
        $client = $auth->createRole('cliente');
        $auth->add($client);
        $auth->addChild($client, $calificar);
        $auth->addChild($client, $comentar);

        // add "admin" role and give this role the "administrar" permission
        // as well as the permissions of the "client" role
        $admin = $auth->createRole('administrador');
        $auth->add($admin);
        $auth->addChild($admin, $adm);
        $auth->addChild($admin, $client);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($client, 2);
        //$auth->assign($admin, 1);
    }
}