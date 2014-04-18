<? echo CHtml::hiddenField($fieldNameLat, $model->{$modelLat}, array('id' => 'yaMapLat')); ?>
<? echo CHtml::hiddenField($fieldNameLong, $model->{$modelLong}, array('id' => 'yaMapLong')); ?>
<? echo CHtml::hiddenField($fieldNameZoom,$model->{$modelZoom}, array('id' => 'yaMapZoom')); ?>


<div id="YMap" style="width: <? echo $width;?>px; height: <? echo $height;?>px;">


</div>