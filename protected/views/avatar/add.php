<?php
    $this->pageTitle=Yii::app()->name . ' | Add Avatar';
?>
        <form id="addAvatarForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype= "multipart/form-data">
            <input type="file" id="file" name="file" value="" placeholder="File" required />
            <input type="text" id="name" name="name" value="" placeholder="Name" required />
            
            <input type="submit" name="submit" value="Add Avatar" />
        </form>