<?php
    $this->pageTitle=Yii::app()->name . ' | View '.$user->account_type.' Account #'.$user->display_id;
?>
        <h3><?php echo $user->first_name.' '.$user->last_name; ?><h3>
        <p>Display Id: <?php echo $user->display_id; ?></p>
        <p>Username: <?php echo $user->username; ?></p>
        <p>Password: <?php echo $user->password; ?></p>
        <p>Account Type: <?php echo $user->account_type; ?></p>
        <p>First Name: <?php echo $user->first_name; ?></p>
        <p>Last Name: <?php echo $user->last_name; ?></p>
        <p>School: <?php echo $school->name; ?></p>