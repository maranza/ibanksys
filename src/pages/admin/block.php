<?php
if (isset($_POST['block'])) {

    $rate = $_POST['rate'];
    $user = $_POST['username'];
    if (isAdmin($user))
        print_flash_message("Admin Cannot be Blocked");
    elseif (Admin::block_user($user, $rate))
        print_flash_message("This user Will be Blocked for " . $rate);
    else
        print_flash_message("Failed to Block");
}
?>
<form action="?page=block" method="POST" onsubmit="return confirm('Are you sure you want to Block this User');">
    <fieldset>

        <legend>Block Online Banking</legend>
        <label>Username</label>
        <input type="text" name="username" required/>
        <br>
        <label>Duration</label>
        <select name="rate">
            <option value="5min">5min</option>
            <option value="1hour">1hour</option>
            <option value="2weeks">2weeks</option>
            <option value="6months">6months</option>
            <option value="4years">4years</option>
        </select>
        <br>
        <input type="submit" name="block" value="Block" class="btn"/>
    </fieldset>

</form>

