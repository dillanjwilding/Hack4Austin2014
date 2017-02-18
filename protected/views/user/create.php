<?php
    $this->pageTitle=Yii::app()->name . ' | Add User';
?>
        <form id="createUserForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" id="username" name="username" value="" placeholder="Username" required />
            <input type="password" id="password" name="password" value="" placeholder="Password" required />
            <?php // avatar ?>
            <select id="school" name="school" required >
                <option value="">Select One</option>
                <?php foreach($schools as $school) { ?>
                <option value="<?php echo $school->display_id; ?>"><?php echo $school->name; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="submit" value="Create User" />
        </form>
