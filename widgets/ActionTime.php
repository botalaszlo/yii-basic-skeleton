<?php

namespace app\widgets;


use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class ActionTime
 * Generate the action's taken time to generate the content.
 *
 * @author Bota Laszlo <bota.laszlo.dev@outlook.com>
 * @package common\widgets
 */
class ActionTime extends Widget
{
    private static $NA = 'n.a.';

    /**
     * @var integer start time which value is passed by the ActionTimeFilter
     * @see \common\components\filters\ActionTimeFilter
     */
    public $startTime;

    /**
     * @var integer spent time.
     */
    public $time;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->startTime === null) {
            $this->startTime = self::$NA;
            Yii::warning('StartTime is N.A.');
        }
        $this->calculateSpentTime();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $timeRounded = round($this->time, 6);
        return Html::encode("Generated in $timeRounded seconds.");
    }

    /**
     * Calculate the spent time.
     */
    private function calculateSpentTime()
    {
        $this->time = microtime(true) - $this->startTime;
    }
}