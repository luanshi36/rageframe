<?php
use yii\helpers\Url;
?>
<?php foreach($models as $k => $model){ ?>

    <?php if(!empty($model['-'])){ ?>
            <?= $this->render('tree', [
                'models'=>$model['-'],
                'parent_title' =>$model['title'],
                'pid' => $model['single_id']." ".$pid,
            ])?>
    <?php } ?>
<?php } ?>




