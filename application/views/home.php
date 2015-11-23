<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">

    <p>My view has been loaded</p>


    <?php foreach($rows as $r)  :  ?>
          <h1><?php echo $r->title; ?></h1>
           <div><?php echo $r->contents; ?></div>

    <?php endforeach; ?>

</div>

</body>
</html>