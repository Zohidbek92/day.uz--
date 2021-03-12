<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="row">
    
    <div class="col-lg-9 col-12">
	    <?php
	    	$lang = Yii::$app->language;
	    	$sarlavha = "sarlavha_".$lang;
	    	$matn = "matn_".$lang;
	    	echo "<h2><b>".$new->$sarlavha."</b></h2>";
	    	$sana = substr($new->sana, 0, 16);
	    	$sana = Yii::$app->formatter->asDate($sana, 'php: d-M.Y H:i');
	    	echo "<p><span class='glyphicon glyphicon-time'></span> ".$sana."&nbsp;&nbsp;<span class='glyphicon glyphicon-eye-open'></span> ";
	    	echo $new->korishlar_soni."</p>";
	    	echo "<img src='rasmlar/".$new->rasm."' width='100%'>";
	    	echo "<h4>".$new->$matn."</h4>";
	    ?>
	</div>
	<div class="col-lg-3 col-12">
		<h3><b><?=Yii::t('app', 'rightnews');?></b></h3>
		<?php
	    	foreach ($news as $new) {
	    		$id = $new->id;
	    		$url = Url::to(['site/fullnews', 'id' => $id]);
	    		echo "<h4><a href='".$url."'>".$new->$sarlavha."</a></h4>";
	    		echo "<img src='rasmlar/".$new->rasm."' width='100%'>";
	    	}
	    ?>
	</div>

</div>
