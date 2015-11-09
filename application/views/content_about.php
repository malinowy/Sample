<div id="content">

            <?php

                   foreach ($results as $row) {
                       $title = $row->title;
                       $text1 = $row->text1;
                       $text2 = $row->text2;
                   }
                //adding <h1> tag for About Page
                   echo heading($title, 1);

              ?>

              <p><?php echo $text1 ?></p>
              <p><?php echo $text2 ?></p>

</div>