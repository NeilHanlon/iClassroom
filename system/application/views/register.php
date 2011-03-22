<p style="margin-top:20px">

    <?php
    if(!empty($message)) {
        echo "<strong>" . $message . "</strong>";
    }
    elseif(!isset($registered)) {
        echo validation_errors();
        $user = set_value('username');
        $fname = set_value('fname');
        $lname = set_value('lname');
        $email = set_value('email');
        $key = set_value('key');
        $userd = array('name' => 'username', 'value' => $user, 'class' => 'text-medium');
        $passd = array('name' => 'password', 'class' => 'text-medium');
        $passcd = array('name' => 'password_check', 'class' => 'text-medium');
        $fnamed = array('name' => 'fname', 'value' => $fname, 'class' => 'text-medium');
        $lnamed = array('name' => 'lname', 'value' => $lname, 'class' => 'text-medium');
        $emaild = array('name' => 'email', 'value' => $email, 'class' => 'text-medium');
        $keyd = array('name' => 'key', 'value' => $key, 'class' => 'text-medium');
        echo form_open('register/submit');
        echo '<fieldset><label for="username">Username: </label>';
        echo form_input($userd);
        echo '<br /><br />';
        echo '<label for="fname" style="clear:both;margin-top:5px;">First Name: </label>';
        echo form_input($fnamed);
        echo '<br /><br />';
        echo '<label for="lname" style="clear:both;margin-top:5px;">Last Name: </label>';
        echo form_input($lnamed);
        echo '<br /><br />';
        echo '<label for="email" style="clear:both;margin-top:5px;">Email: </label>';
        echo form_input($emaild);
        echo '<br /><br />';
        echo '<label for="password" style="clear:both;margin-top:5px;">Password: </label>';
        echo form_password($passd);
        echo '<br /><br />';
        echo '<label for="password_check" style="clear:both;margin-top:5px;">Password (again): </label>';
        echo form_password($passcd);
        echo '<br /><br />';
        echo '<label for="key" style="clear:both;margin-top:5px;">Class Key: </label>';
        echo form_input($keyd);
        echo '<br /><br  style="clear:both;margin-top:5px;"/>';
        echo form_submit('submit', 'Register');
        echo form_close();
        echo '</fieldset>';
    }
    else {

}
?>
</p>
<?php $this->load->view('footer'); ?>