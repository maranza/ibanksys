
<p>


    <?php
    if (isset($_POST['apply'])) {
        if (checkloan($profile->getIdnumber()))
            print_flash_message("Your previous Loan request Has not been Approved Yet.<br>");
        else
            addLoan($profile->getIdnumber(), $_POST['type'], $_POST['amt'], $_POST['date']);
    }
    ?>



    <br>
    <img src="img/loan_icon.jpg" alt="Loan"/><br>

    <br>

<?php if (getAppliedLoans($profile->getIdnumber()) > 0)  ?>
    <a href="?page=viewloans">View Loans</a>

<form action="?page=loan" method="post">
    <fieldset>
        <legend>Apply For a Loan</legend>

        <label>Type of Loan</label><br>
        <select name="type" required>

            <option value="HouseLoan">HouseLoan</option>
            <option value="Vehicle Loan">Vehicle Loan</option>


        </select><br>

        <label>Requested Amount</label><br>
        <input type="text" name="amt"  required/><br>
        <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
        <input type="submit" name="apply" value="Apply" class="btn" required>
        <input type="reset" name="cancel" value="Cancel" class="btn" required>

    </fieldset>
</form>

</p>
