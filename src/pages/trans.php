<?php $data=getTransactions($profile->getAccnumber());?>
<table width="" cellpadding="0" cellspacing="0" class="table">
<thead>
<tr bgcolor="#FFCC00" >
<th width="100">Date</th>
<th  width="300">Transaction Description</th>
<th width="90">Payments</th>
<th width="90">Balance</th>
<th width="90">Deposit</th>

</thead>
<tbody>

<?php
 foreach( $data as $value){ ?>
<tr>

<td><?php  echo $value['date'];?></td>
<td><?php echo $value['description'];?></td>
<td ><?php  if($value['payments']!=0) echo "-".$value['payments'];?></td>
<td ><?php echo $value['balance'];?></td>
<td ><?php  if ($value['deposits']!=0) echo "+".$value['deposits'];?></td>

</tr>
<?php }?>
</tbody>

</table>

