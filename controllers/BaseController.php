<?php
/**
 * Created by PhpStorm.
 * User: juliana
 * Date: 02/04/17
 * Time: 12:21
 */

namespace app\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
}