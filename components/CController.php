<?php

namespace app\components;

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
//            print("<pre>".print_r(Yii::$app->user,true)."</pre>");
//                exit;
            if(Yii::$app->user->isGuest){

                return $this->redirect(['site/login']);
            }else{
                if (in_array($action->id, $this->overrideSecurity())){
                    return true;
                }else{

                        $c = models\Controller::findOne(['name'=>$action->controller->id]);
                        if(empty($c)){
                            $c = new models\Controller();
                            $c->name = $action->controller->id;
                            $c->friendly_name= $action->controller->id;
                            $c->description = "Controlador creado automaticamente";
                            $c->save();
                        }
                        $a = models\Action::find()
                                ->joinWith('controller')
                                ->where('controller.name=:NombreControlador AND action.name=:NombreAccion',
                                            [':NombreControlador'=>$action->controller->id, ':NombreAccion'=>$action->id]
                                        )
                                ->one();

                        if(empty($a)){
                            $a = new models\Action();
                            $a->name = $action->id;
                            $a->friendly_name= $action->id;
                            $a->controller_id = $c->id;
                            $a->description = "Accion creada automaticamente";
                            $a->save();
                        }
                        $p = models\RolePermissions::findOne(['action_id'=>$a->id, 'role_id'=> Yii::$app->user->identity->role_id]);
                        if(empty($p)){
                            $p = new models\RolePermissions();
                            $p->action_id = $a->id;
                            $p->role_id = Yii::$app->user->identity->role_id;
                            $p->permission = YII_ENV_DEV == true ? 1 : 0;
                            $p->save();
                        }
                        if($p->permission == 0){
                            return $this->redirect(['site/desautorizado']);
                        }
                        return true;
                }
            }
        }
    }
}
