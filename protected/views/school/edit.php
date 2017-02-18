<?php
    $this->pageTitle=Yii::app()->name . ' | Edit School #'.$school->display_id;
?>
        <form id="addSchoolForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" id="name" name="name" value="<?php echo $school->name; ?>" placeholder="Name" required />
            <input type="submit" name="submit" value="Update School" />
        </form>
