
<?php
if (isset($_POST['add'])) {
    //prevents customer from adding himself/herself as a beneficiary
    if ($profile->getAccnumber() != trim($_POST['acn'])) {
        addBen($profile->getAccNumber(), array($_POST['name'], $_POST['acn'], $_POST['branch'], $_POST['bank']));
        unset($_POST);
    } else
        print_flash_message("You cant Add yourself as a beneficiary");
}
?>

<p>

<fieldset>

    <legend>Add Beneficiary</legend>
    <form action="<?php print "?page=add"; ?>"  method="POST">
        <label>Account name</label><br>
        <input type="text" name="name" id="name" value="<?php print @$_POST['name']; ?>" required/>

        <br>

        <label>Account Number</label><br>
        <input type="text" name="acn"  value="<?php print @$_POST['acn']; ?>" required/>
        <br>

        <label>Bank Name</label><br>
        <select name="bank">
            <option value="Africobank">Africobank</option>
            <option value="Standard Bank">Standard Bank</option>
            <option value="Bank of Ghana">WesternUnion</option>

        </select>
        <br>
        <label>Branchcode</label><br>

        <input type="text" name="branch" value="<?php print @$_POST['branch']; ?>" required />
        <br>
        <input type="submit" name="add" value="Add" class="btn"/>

    </form>
    <p>
        <a href="?page=pay">Payments</a>
        <br>
        <a href="?page=amend">Amend Beneficiaries</a>
    </p>

</fieldset>
</p>
