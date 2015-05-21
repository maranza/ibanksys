
<div id="welcome">
    <b>Welcome <?php print $profile->getFirstname(); ?></b><br>
    <b>Your account Number is <?php print $profile->getAccNumber(); ?></b><br>


    <b>Your current Balance is R<?php print $profile->getBalance() . ".00"; ?></b>
    <p>
        <br>

        <img src="img/InternetBanking.jpg" alt="Banking "/>


    </p>

</div>
