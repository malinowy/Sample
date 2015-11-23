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

<div id="options">
     <h2>Create</h2>

     <?php echo form_open('site/create');?>

          <p>
                    <label for="name">Title </label>
                    <input type="text" name="title" id="title" >
          </p>

          <p>
                    <label for="name">Content </label>
                    <input type="text" name="contents" id="contents" >
          </p>

          <p><?php echo form_submit('submit', 'Submit'); ?></p>

     <?php echo form_close(); ?>

     <hr />

     <h2>Read</h2>

     <?php if (isset($records)) : foreach($records as $row) : ?>
             <!-- it is impotrant to know that we must use "" inside the anchor parantheses to make php understand -->
            <h2><?php echo anchor("site/delete/$row->id", $row->title); ?> </h2>
            <!-- we replaced with the line above to make it clickable to delete
            <h2><?php echo $row->title; ?> </h2> -->
            <div><?php echo $row->contents; ?></div>
     <?php endforeach; ?>

      <?php else : ?>
            <h2>No records were return</h2>
      <?php endif; ?>

      <hr />

      <h2>Delete</h2>
      <p>
        To sample the delete method, simply click on one of the headings listed above. A delete
        query will automatically run
      </p>

</div>

</body>
</html>