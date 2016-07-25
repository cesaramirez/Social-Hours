<?php

namespace app\components;

use app\models;

class Validation{

    public static function PoseePermisos($controllerName, $actionName){
        $idRol = \Yii::$app->user->identity->IdRol;
        $controller = models\Controlador::findOne(['Nombre'=>$controllerName]);
        if($controller == null)
            return false;
        else{
            //if(!Validation::PoseeSubModulo($controller->IdSubModulo))
                //return false;
            $action = models\Accion::findOne(['IdControlador'=> $controller->Id, 'Nombre'=>$actionName]);
                if($action == null)
                    return false;
                else{
                    $permisoRol = models\PermisoRol::findOne(['IdAccion'=>$action->Id, 'IdRol'=>$idRol]);
                    if($permisoRol==null)
                        return false;
                    else{
                        if($permisoRol->Permiso == false)
                            return false;
                        return true;
                    }
                }
        }
    }
    /*public static function PoseeSubModulo($idSubModulo){
        $subModulo = Submodulo::model()->findByPk($idSubModulo);
        if($subModulo->IdModulo == 1)
            return true;
        else{
            $empresa = Empresa::model()->findByPk(Yii::app()->user->Empresa->Id);
            if(empty($empresa->IdSubModulos))
                return false;
            foreach($empresa->IdSubModulos as $idSubMod){
                if($idSubMod == $idSubModulo){
                    return true;
                }
            }
            return false;
        }
    }*/

    public static function validaSesion(){
        if(\Yii::$app->user->isGuest){
            \Yii::$app->getResponse()->redirect(\Yii::getAlias('@web')."/site/login?returnUrl=");
        }
    }
}