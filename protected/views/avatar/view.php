<?php
    $this->pageTitle=Yii::app()->name . ' | View Avatar #'.$avatar->id;
?>
        <h3><?php echo $avatar->name; ?></h3>
        <p><?php echo $avatar->file; ?></p>
        <img src="<?php echo Yii::app()->request->baseUrl.'/images/'.$avatar->file; ?>" alt="<?php echo $avatar->name; ?>" />