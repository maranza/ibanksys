<?php $data = getAppliedLoans($profile->getIdnumber());
?>
<h1>Loans Applied</h1>
<table width="" cellpadding="0" cellspacing="0" >
    <thead>
        <tr bgcolor="#FFCC00">
            <th width="100">DateApplied</th>
            <th width="200">DateApproved</th>
            <th width="200">TypeofLoan</th>
            <th width="100">Status</th>
            <th width="100">Amount</th>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr align="center">

                <td><?php echo $value['dateapplied']; ?></td>
                <td ><?php echo $value['dateapproved']; ?></td>
                <td><?php echo $value['typeofloan']; ?></td>
                <td ><?php loanrespond($value['status']); ?></td>
                <td ><?php echo $value['amount']; ?></td>


            </tr>
<?php } ?>
    </tbody>

</table>







