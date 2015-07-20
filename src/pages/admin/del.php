

<?php
if (isset($_POST['del'])) {
    check_token();
    $id = $_POST['id'];

    if (isAdmin($id))
        print_flash_message("Admin Cannot be Deregistered");

    elseif (Admin::deleteinet($id))
        print_flash_message($id . " Has Been Deregistered from this Bank");
    else
        print_flash_message("Failed :(");
}
?>

<form action="" method="post" onSubmit="return confirm('Are you sure you want to Deregister this Customer ?')">
    <fieldset>
        <legend>Deregister Customer</legend>
        <label>Customer's ID Number</label><br>

        <input type="text" name="id" required /><br>
        <?php draw_tokenbox(); ?>
        <input type="submit" name="del" value="Degregister" class="btn"/>

    </fieldset>
</form>
