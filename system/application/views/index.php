<p style="margin-top:20px">
    <?php
    if(!empty($loggedout)) {
        echo "<strong>You are now logged out.</strong>";
    }
    elseif(!empty($message)) {
        echo "<strong>" . $message . "</strong>";
    }
    else {
    }
    echo '<p style="margin-top:20px;">';
    $user = set_value('username');
    $userdata = array('name' => 'username', 'value' => $user, 'class' => 'text-medium');
    $passdata = array('name' => 'password', 'class' => 'text-medium');
    echo validation_errors();
    echo form_open('index/submit');
    echo '<fieldset><label for="username">Username: </label>';
    echo form_input($userdata);
    echo '<br /><br />';
    echo '<label for="password" style="clear:both;margin-top:5px;">Password: </label>';
    echo form_password($passdata);
    echo '<br /><br style="clear:both;margin-top:5px;"/>';
    echo form_submit('submit', 'Login');
    echo form_close();
    echo '</fieldset></p>';
    ?>
</p>

<p style="padding:5px;"><br />Page rendered in {elapsed_time} seconds</p>
<?php $this->load->view('footer'); ?>