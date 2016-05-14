<?php
/**
 * Created by PhpStorm.
 * User: lacc
 * Date: 2016.05.13.
 * Time: 23:39
 */

namespace app\components;


use Yii;
use yii\base\ActionFilter;

/**
 * Class ActionTimeFilter
 * Action time filter calculates the time of the action process.
 *
 * @package app\components
 */
class ActionTimeFilter extends ActionFilter
{
    private $_startTime;

    public function beforeAction($action)
    {
        $this->_startTime = microtime(true);
        Yii::$container->set('app\widgets\ActionTime', ['startTime' => $this->_startTime]);
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->_startTime;
        Yii::trace("Action '{$action->uniqueId}' spent $time second.");
        return parent::afterAction($action, $result);
    }
}
