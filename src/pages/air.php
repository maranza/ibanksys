
<?php
if (isset($_POST['send'])) {
    check_token();
    $price = $_POST['price'];
    $service = $_POST['ser'];
    if ($profile->getBalance() >= $price) {


        purchase_air($profile->getAccNumber(), $price);
        transactions($profile->getAccNumber(), $_POST['date'], "Purchased R" . $price . $service . " Airtime", $price, $profile->getBalance() - (float) $price, 0);



        print_flash_message("Airtime has been purchased");
    } else
        print_flash_message("Insufficient Balance");
}
?>
<form action="?page=air" method="POST" onsubmit="return confirm('Are you sure you want to purchase this airtime?');">
    <fieldset>

        <legend>Purchase Airtime</legend>
        <label>Service Provider</label>
        <select name="ser" required>
            <option>MTN</option>
            <option>Vodacom</option>
        </select>
        <br>
        <label>Price</label>
        <select name="price">
            <option value="5">R5</option>
            <option value="10">R10</option>
            <option value="30">R30</option>
        </select>
        <br>
        <label>Cellnumber</label><br>
        <input type="text" name="cell" required pattern="[0-9]{10}" title="Enter a Valid CellphoneNumber"/><br>
        <input type="hidden" name="date" value="<?php print date("Y-m-d"); ?>" />
        <?php draw_tokenbox(); ?>
        <input type="submit" name="send" value="Buy"/>
        <input type="reset" name="cancel" value="Cancel" />
    </fieldset>
</form>
<br>
<img src="http://www.mtndeals.co.za/images/callpersecond.jpg" />
