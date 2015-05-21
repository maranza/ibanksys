

<table cellpadding="0" cellspacing="0" width="300">
    <tr>
        <td>

            <form action="" method="post">
                <fieldset>
                    <legend>Deposit/WithDraw</legend>
                    <p>Current Balance</p>
                    <?php
                    print $profile->getBalance();
                    ?>
                    <br>
                    <input type="radio" name="tra" required />Withdraw
                    <input type="radio" name="tra" required />Deposit
                    <br>
                    <input type="text" name="amt" required /><br>

                    <input type="submit" name="sub" value="Submit" class="btn" />
                </fieldset>
            </form>

        </td>
    <tr>

</table>