<p style="margin-top:20px;">
<div class="jNice">
    <h3>Your Classes</h3>
    <table cellpadding="0" cellspacing="0">
        <tr style="font-weight:bold;" class="odd">
            <td>Class Name</td>
            <td>Teacher</td>
            <td class="action">Actions</td>
        </tr>
        <?php
        $run = 0;
        $count = count($classes);
        while($run != $count) {
            if($run & 1 == true) {
                echo '<tr class="odd">
                <td>' . $classes[$run]['class'] . '</td>
                <td>' . $classes[$run]['teacher'] . '</td>
                    <td class="action">
                        <a href="#" class="view">View</a>
                        <a href="#" class="edit">Edit</a>
                        <a href="#" class="delete">Delete</a>
                    </td>
        </tr>';
            }
            else {
                echo '<tr>
                <td>' . $classes[$run]['class'] . '</td>
                <td>' . $classes[$run]['teacher'] . '</td>
                    <td class="action">
                        <a href="#" class="view">View</a>
                        <a href="#" class="edit">Edit</a>
                        <a href="#" class="delete">Delete</a>
                    </td>
        </tr>';
            }
            $run++;
        }
        ?>
    </table>
</div>
<p>
    <?php
    if(isset($message)) {
        echo "<strong>" . $message . "</strong>";
    }
    else {

    }
    $keydata = array('name' => 'key', 'class' => 'text-medium');
    echo validation_errors();
    echo form_open('members/addclass');
    echo '<fieldset><label for="key">Key: </label>';
    echo form_input($keydata);
    echo form_submit('submit', 'Add Class');
    echo form_close();
echo '</fieldset>';
?>
</p>
<p style="padding:5px;"><br />Page rendered in {elapsed_time} seconds</p>
<?php $this->load->view('footer'); ?>