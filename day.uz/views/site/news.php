<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::t('app', 'yangilik');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    
    <div class="col-lg-9 col-12">
    	<h2><b><?=Yii::t('app', 'leftnews');?></b></h2>
	    <?php
	    	$lang = Yii::$app->language;
	    	$sarlavha = "sarlavha_".$lang;
	    	$bolim_nomi = "bolim_nomi_".$lang;
	    	foreach ($news as $new) {
	    		$b = $new->bolimlar->$bolim_nomi;

	    		if($b == "Dunyo" or $b == "Дунё" or $b == "Мир" or $b == "World"){
	    			$bolim = "dunyo";
	    		}

	    		if($b == "Sport" or $b == "Спорт"){
	    			$bolim = "sport";
	    		}

	    		if($b == "O'zbekiston" or $b == "Ўзбекистон" or $b == "Узбекистон" or $b == "Uzbekistan"){
	    			$bolim = "uzbekistan";
	    		}

	    		$id = $new->id;
	    		$url = Url::to(['site/fullnews', 'id' => $id]);
	    		echo "<h2><a href='".$url."'>".$new->$sarlavha."</a></h2>";
	    		echo "<img src='rasmlar/".$new->rasm."' width='70%'>";
	    		$sana = substr($new->sana, 0, 16);
	    		$sana = Yii::$app->formatter->asDate($sana, 'php: d-M.Y / H:i');
	    		echo "<br><br><p>".$sana."&nbsp;&nbsp;<a href='".\yii\helpers\Url::to(['site/'.$bolim])."'>#";
	    		echo $new->bolimlar->$bolim_nomi."</a></p><hr>";
	    	}
	    ?>
		<?php
		echo LinkPager::widget([
		    'pagination' => $pages,
		]);
		?>
	</div>
	<div class="col-lg-3 col-12">
		<h3><b><?=Yii::t('app', 'rightnews');?></b></h3>
		<?php
	    	foreach ($koplab as $kop) {
	    		$id = $kop->id;
	    		$url = Url::to(['site/fullnews', 'id' => $id]);
	    		echo "<h4><a href='".$url."'>".$kop->$sarlavha."</a></h4>";
	    		echo "<img src='rasmlar/".$kop->rasm."' width='100%'>";
	    	}
	    ?>
	</div>

</div>
