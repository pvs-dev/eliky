<?php
/**
 * Работа с пользователями
 */

namespace console\controllers;

use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\console\Controller;
use yii\helpers\VarDumper;
use common\models\User;

class UserController extends Controller
{


    public function actionIndex()
    {
        echo <<<INFO
Availiable actions:
    add <email> <password> [<role>] -- add user
    passwd <username> <password> -- change user password
    role <username> <role> -- add user role

INFO;
    }

    public function actionAdd($email = null, $password = null)
    {
        if (empty($email) || empty($password)) {
            throw new InvalidParamException('Empty email or password.');
        }
        if (!preg_match('#^[-_a-z0-9.]+@[-_a-z0-9.]+$#', $email)) {
            throw new InvalidParamException('Invalid email.');
        }
        $user = User::find()->where(['username' => $email])->one();
        if (!empty($user)) {
            throw new InvalidParamException("User '{$email} already exist.");
        }
        $user = new User();
        $user->username = $email;
        $user->email = $email;
        $user->password = $password;
        $user->auth_key = '123S';
        if (!$user->save()) {
            throw new Exception('Error creating user: ' . VarDumper::export($user->getErrors()));
        }
        echo 'User added' . PHP_EOL;
    }

    public function actionPasswd($username = null, $password = null)
    {
        if (empty($username) || empty($password)) {
            throw new InvalidParamException('Empty username or password.');
        }
        $user = User::find()->where(['username' => $username])->one();
        if (empty($user)) {
            throw new InvalidParamException("User '{$username} does not exist.");
        }
        $user->password = $password;
        if (!$user->save()) {
            throw new Exception('Error changing password: ' . VarDumper::export($user->getErrors()));
        }
        echo 'Password changed' . PHP_EOL;
    }


}
