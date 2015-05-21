<?php
if (isset($_POST['pay'])) {
    $amt = (float) $_POST['amount'];
    $sep = sep($_POST['beni']);
    $beni = new Profile(NULL, $sep[0]);
    $bal1 = $profile->getBalance(); //before tranferer  balance

    if ($amt > 0) {

        if ($profile->getBalance() >= $amt) {
            transfer($amt, $profile->getAccNumber(), $sep[0]);
            //transactions($acc,$date,$des,$pay,$bal,$depo)
//transferer transactions
            transactions($profile->getAccNumber(), $_POST['date'], "Transfered to  " . $sep[1] . " REF # " . $_POST['ref'], $amt, $bal1 - $amt, 0);
//beneficiary transactions
            transactions($sep[0], $_POST['date'], " Received Payments From " . $profile->getFirstname() . " REF # " . $_POST['ref'], 0, $beni->getBalance() + $amt, $amt);

            unset($_POST);
        } else
            print_flash_message("*You dont have enough money");
    }
}
?>
<p>
</p>
<form action="" method="post" onsubmit="return confirm('Are you sure you want to make this transfer?');">
    <fieldset>
        <legend>Payments</legend>
        <label>Beneficiary</label>

        <br>

        <select name="beni" required>

<?php foreach ($data as $value) { ?>
                <option value=<?php print $value['baccnumber'] . "#" . $value['accname']; ?>><?php print $value['accname']; ?></option>

<?php } ?>

        </select><br>
        <label>Reference Number</label><br>

        <input type="text" name="ref" value="<?php print @$_POST['ref']; ?>" required pattern="[0-9]+$"/>
        <br>
        <label>Amount</label><br>
        <input type="text" name="amount"  value="<?php print @$_POST['amount']; ?>" required pattern="[1-9]{1}([0-9])+" title="Amount"/>
        <input type="hidden" name="date" value="<?php print date("Y-m-d"); ?>" />
        <br>
        <input type="submit" name="pay" value="Transfer" class="btn"/>
        <input type="reset" value="Cancel Transfer" class="btn" />
    </fieldset>
</form>
<a href="?page=add">Add Beneficiary</a><br>
<a href="?page=air">Buy Airtime</a>
