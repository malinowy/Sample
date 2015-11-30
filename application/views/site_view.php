<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="screen" charset="utf-8">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>


</head>
<body>

    <div id="container-pagination">
        <h1>Super Pagination with CodeIgniter</h1>

        <!-- $records are data that we get from DB through array $data['records'] -->
        <?php echo $this->table->generate($records); ?>
        <?php echo $this->pagination->create_links(); ?>
        <script type="text/javascript" charset="utf-8">
            $('tr:odd').css('background', '#e3e3e3');
        </script>

    </div>

</body>
</html>