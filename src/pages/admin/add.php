<?php
if (isset($_POST['reg'])) {
    //INSERT INTO customer values(:name,:last,:dob,:id,:pass,:add,:mob,:email)
    $data = array();
    $data['name'] = $_POST['fname'];
    $data['last'] = $_POST['lname'];
    $data['dob'] = $_POST['dob'];
    $data['id'] = $_POST['id'];
    $data['pass'] = $_POST['pass'];
    $data['add'] = $_POST['add'];
    $data['mob'] = $_POST['mobile'];
    $data['email'] = $_POST['email'];

    $type = $_POST['type'];

    if (Admin::register_customer($data)) {
        if (Admin::register_acc($data['id'], $type)) {

            $message = "Dear " . $data['name'] . "\n Congrats you are now a member of This Bank\n Your Account Number is :" . Admin::$accnumber . "\n Account Type:" . $type;

            print_flash_message("New Customer is now registered<br>");
            if (send_mail($data['email'], $message))
                print_flash_message("Account Info Sent to Customer's Mail");


            UNSET($_POST);
        }
    } else
        print_flash_message("Failed to Add Customer");
}
?>
<form action="?page=add" method="post">
    <fieldset>
        <legend>Register New Customers</legend>
        <table width="628" height="253" border="0">
            <tr>
                <td width="362">Firstname</td>
                <td width="256">Address</td>
            </tr>
            <tr>
                <td><input type="text" name="fname" id="textfield" autofocus value="<?php print @$_POST['fname']; ?>" required></td>
                <td><textarea name="add" id="address" required><?php print @$_POST['add']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td>MobileNumber</td>
            </tr>
            <tr>
                <td><input type="text" name="lname" value="<?php print @$_POST['lname']; ?>"  required></td>
                <td><input type="text" name="mobile"  value="<?php print @$_POST['mobile']; ?>" pattern="[0-9]{10}"  required></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>EmailAddress</td>
            </tr>
            <tr>
                <td><input type="date" name="dob" id="date" value="<?php print @$_POST['dob']; ?>" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Date Should be in this format YYYY-MM-DD"  required></td>
                <td><input type="email" name="email" value="<?php print @$_POST['email']; ?>"  id="textfield6" required></td>
            </tr>
            <tr>
                <td>IDNumber</td>
                <td>AccountType</td>
            </tr>
            <tr>
                <td><input type="text" name="id" value="<?php print @$_POST['id']; ?>" pattern="[0-9]{13}"  required></td>
                <td><select name="type" id="select" required>
                        <option value="Savings">Savings</option>
                        <option value="Checking">Checking</option>
                    </select></td>
            </tr>
            <tr>
                <td>PassPortNumber</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text" name="pass" value="<?php print @$_POST['pass']; ?>"  id="textfield4" required></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br>
        <input type="submit" name="reg" value="Register" class="btn" />
        <input type="reset" name="res" value="Cancel"  class="btn"/>
    </fieldset>
</form>

