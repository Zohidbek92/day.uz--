<?php

namespace app\components;


class TilAlmash extends \yii\base\Behavior
{
	
	public function events()
	{
		return [\yii\web\Application::EVENT_BEFORE_REQUEST=>'almash'];
	}
	public function almash()
	{
		\Yii::$app->language = \Yii::$app->session->get('til');
	}

}

?>