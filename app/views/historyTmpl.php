<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo URL_ROOT;?>">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo URL_ROOT;?>public/css/styles.css">
  </head>
  <body>
    <div class="flex">
      <a class="btn" href="public/index.php">Show calculator</a>
    </div>
    <div class="flex">
      <h1>History table</h1>
    </div>
    <table>
      <tr><th>id</th><th>operation</th><th>sum</th></tr>
      <?php echo $output;?>
    </table>
  </body>
</html>
