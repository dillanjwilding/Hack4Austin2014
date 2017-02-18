<?php
    $this->pageTitle=Yii::app()->name . ' | Add School';
?>
        <form id="addSchoolForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" id="name" name="name" value="" placeholder="Name" required />
            <input type="submit" name="submit" value="Add School" />
        </form>
