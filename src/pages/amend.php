<script type="text/javascript">
    $(document).ready(function () {
        $('#ben').DataTable();
    });
</script>
<?php
$data = getlist($profile->getAccNumber());
if (isset($_GET['del'])) {
    if (delete_bene((int) $_GET['del']))
        header("Location:?page=amend");
}
?>
<h1>Beneficiary List</h1>
<table id="ben" cellpadding="0" cellspacing="0" class="display">
    <thead>
    <th>AccountName</th>
    <th>Name of Bank</th>
    <th>AccNumber</th>
    <th>Action</th>
</thead>
<tbody>

    <?php foreach ($data as $value) { ?>
        <tr>
            <td ><?php echo $value['accname']; ?></td>
            <td><?php echo $value['bankname']; ?></td>
            <td><?php echo $value['baccnumber']; ?></td>
            <td><?php echo "<a href=\"?page=amend&del=" . $value['benfid'] . "\" onclick=\"return confirm('Are you sure you want to delete?')\">Delete</a>&nbsp"; ?>
        </tr>
    <?php } ?>
</tbody>

</table>

