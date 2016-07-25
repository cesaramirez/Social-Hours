<?php

namespace app\compoponent;

use Yii;
use yii\web\Controller;
use app\models;


class CController extends Controller{
    public function overrideSession(){
        return [];
    }
    public function overrideSecurity(){
        return [];
    }

    public function beforeAction($action) {

        if(in_array($action->id, $this->overrideSession())){
                    return true;
        }else{
            if(Yii::$app->user->isGuest){
                return $this->redirect(['site/login']);
            }else{
                if (in_array($action->id, $this->overrideSecurity())){
                    return true;
                }else{

                        $c = models\Controlador::findOne(['Nombre'=>$action->controller->id]);
                        if(empty($c)){
                            $c = new models\Controlador();
                            $c->Nombre = $action->controller->id;
                            $c->NombreAmigable = $action->controller->id;
                            $c->Descripcion = "Controlador creado automaticamente";
                            $c->save();
                        }
                        $a = models\Accion::find()
                                ->joinWith('controlador')
                                ->where('controlador.Nombre=:NombreControlador AND accion.Nombre=:NombreAccion',
                                            [':NombreControlador'=>$action->controller->id, ':NombreAccion'=>$action->id]
                                        )
                                ->one();

                        if(empty($a)){
                            $a = new models\Accion();
                            $a->Nombre = $action->id;
                            $a->NombreAmigable = $action->id;
                            $a->IdControlador = $c->Id;
                            $a->Descripcion = "Accion creada automaticamente";
                            $a->save();
                        }
                        $p = models\PermisoRol::findOne(['IdAccion'=>$a->Id, 'IdRol'=> Yii::$app->user->identity->IdRol]);
                        if(empty($p)){
                            $p = new models\PermisoRol();
                            $p->IdAccion = $a->Id;
                            $p->IdRol = Yii::$app->user->identity->IdRol;
                            $p->Permiso = YII_ENV_DEV == true ? 1 : 0;
                            $p->save();
                        }
                        if($p->Permiso == 0){
                            return $this->redirect(['site/desautorizado']);
                        }
                        return true;
                }
            }
        }
    }
}
