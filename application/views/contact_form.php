<div id="contact_form">

    <h1>Contact Us</h1>

    <?php
    echo form_open('contact/submit');
    //we add id="name" to pass it through javascript
    echo form_input('name', 'Name', 'id="name"');
    echo form_input('email', 'Email', 'id="email"');
    // we specify the coloumns and rows for textarea
    $data = array('name' => 'message', 'cols' => 30, 'rows' => 15 );
    //we pass variable $data to textarea field
    echo form_textarea($data, 'Message', 'id="message"');
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
    ?>

</div>

<script type="text/javascript">
    $('#submit').click(function() {

        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        if ( !name || name == 'Name') {
            alert('Please enter your name');
            return false;
        }

        if ( !email || email == 'Email') {
            alert('Please enter your Email address');
            return false;
        }

        if ( !message || message == 'Message') {
            alert('Please enter your Message');
            return false;
        }

        var form_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val(),
            ajax: '1'  //this makes CodeIgniter realize that a request is comming as an ajax call
                          // this alows to be loaded only the content of contact_submitted.php in contact.php -> line18
        } ;

        $.ajax({
            url: "<?php echo site_url('contact/submit'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $('#main_content').html(msg);
            }
        });

        return false;
    });
</script>