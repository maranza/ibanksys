<?php
if (isset($_POST['update'])) {
    check_token();
    updateStatus($profile->getIdnumber(), array($_POST['fname'], $_POST['lastname'], $_POST['email'], $_POST['mobile'], $_POST['address']));
}
?>
<form action="<?php print "?page=status"; ?>" method="post">
    <fieldset>
        <legend>Update Profile</legend>
        <label>Firstname</label><br>
        <input type="text" name="fname" value="<?php echo $profile->getFirstname(); ?>" required pattern="[a-zA-Z]{1,20}"><br>
        <label>Lastname</label><br>
        <input type="text" name="lastname" value="<?php echo $profile->getLastname(); ?>" required pattern="[a-zA-Z]{1,20}"/><br>
        <br>
        <?php draw_tokenbox(); ?>
        <label>Email Address</label><br>
        <input type="email" name="email" value="<?php echo $profile->getEmail(); ?>" required/><br>
        <label>Mobile Number</label><br>
        <input type="text" name="mobile" value="<?php echo $profile->getMobilenumber(); ?>" pattern="[0-9]{10}" required/><br>
        <label>Address</label>
        <textarea name="address" required><?php echo $profile->getAddress(); ?></textarea>
        <br>
        <input type="submit" name="update" value="Update" class="btn"/>

        <input type="reset" name="cancel" class="btn"/>

    </fieldset>

</form>
