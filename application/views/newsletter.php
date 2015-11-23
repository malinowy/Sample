<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="screen" charset="utf-8">

</head>
<body>

    <div id="newsletter_form">
        <h2>Sign Up for the Newsletter</h2>

        <!-- when SERVER_ROOT is set in autoload, then we do not need to add the full pass for form_open(); -->
        <?php echo form_open('email/send'); ?>

             <?php

                  $name_data = array(
                        'name' => 'name',
                        'id' => 'name',
                        'value' => set_value('name')
                    );

             ?>

             <p><label for="name">Name: </label><?php echo form_input($name_data); ?></p>

             <p>
                    <label for="name">Email Address: </label>
                    <input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>">
             </p>

             <p><?php echo form_submit('submit', 'Submit'); ?></p>

        <?php echo form_close(); ?>

        <?php echo validation_errors('<p class="error">'); ?>

    </div> <!-- End newsletter-form -->


</body>
</html>