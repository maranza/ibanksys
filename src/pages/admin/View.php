<?php
$data = Admin::viewAccounts();
?>


<script type="text/javascript">

    $(document).ready(function () {

        $('#customers').DataTable();
    });



</script>
<h1>Customers Accounts Summaries</h1>
<table id="customers" width="" cellpadding="0" cellspacing="0" class="display">
    <thead>
        <tr bgcolor="#FFCC00">
            <th width="250">AccountNumber</th>
            <th width="100">CurrentBalance</th>
            <th width="100">Payments</th>
            <th width="100">Deposits</th>

    </thead>
    <tbody>

<?php foreach ($data as $value) { ?>
            <tr>

                <td><?php echo $value['accnumber']; ?></td>
                <td ><?php echo "R" . $value['balance'] . ".00"; ?></td>
                <td><?php echo "R" . $value['Payments'] . ".00"; ?></td>
                <td ><?php echo "R" . $value['Deposits'] . ".00"; ?></td>
            </tr>
<?php } ?>
    </tbody>

</table>

