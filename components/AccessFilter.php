<?php

namespace app\components;

use Yii;
use yii\base\ActionFilter;
use app\models\Controller;
use app\models\Action;
use app\models\RolePermissions;

class AccessFilter extends ActionFilter{

    public $overideSession = [];
    public $overideSecurity = [];

    public function beforeAction($action) {
        if(in_array($action->id, $this->overideSession)){
            return true;
        }else{
            if(Yii::$app->user->isGuest){
                Yii::$app->user->loginRequired();
            }
            else{
                if (in_array($action->id, $this->overideSecurity)){
                    return true;
                }
                else{
                    $c = Controller::findOne([
                           'name'=>$action->controller->id
                         ]);
                    if(empty($c)){
                        $c = new Controller();
                        $c->name = $action->controller->id;
                        $c->friendly_name= $action->controller->id;
                        $c->description = "Controlador creado automaticamente";
                        $c->save();
                    }
                    $a = Action::findByController(
                         $action->controller->id,
                         $action->id);

                    if(empty($a)){
                        $a = new Action();
                        $a->name = $action->id;
                        $a->friendly_name= $action->id;
                        $a->controller_id = $c->id;
                        $a->description = "Accion creada automaticamente";
                        $a->save();
                    }
                    $p = RolePermissions::findOne([
                          'action_id'=>$a->id,
                          'role_id'=> Yii::$app->user->identity->role_id
                        ]);
                    if(empty($p)){
                        $p = new RolePermissions();
                        $p->action_id = $a->id;
                        $p->role_id = Yii::$app->user->identity->role_id;
                        // $p->permission = YII_ENV_DEV == true ? 1 : 0;
                        $p->permission = 0;
                        $p->save();
                    }
                    if($p->permission == 0){
                        // return $this->redirect(['site/desautorizado']);
                        return Yii::$app->getResponse()->redirect('site/unauthorized');
                    }
                    return true;
                }
            }
        }
    }
}