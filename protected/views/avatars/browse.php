<?php
    $this->pageTitle=Yii::app()->name . ' | Browse Avatars';
?>

        <div id="wrapper">
            <section>
                <ul id="gallery">
            
                    <?php foreach($avatars as $avatar) { ?>
                    <li id="<?php echo $avatar->name; ?>">
                        <a href="#">
                            <img src="<?php echo Yii::app()->request->baseUrl.'/images/'.$avatar->file; ?>" alt="<?php echo $avatar->name; ?>" width="70%" />
                            <p><?php echo $avatar->name; ?></p>
                        </a>
                    </li>
                    <?php } ?>
                
                </ul>
            </section>
        </div>