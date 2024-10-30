<?php
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/Links/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Links/actions/generate.php';
$short = [''];
$full= '';
if (key_exists(key: 'full', array: $_POST)) {
$full= $_POST['full'];
$res = $pdo->query('select full from link where full = "'.$full.'"')->fetch(mode: PDO::FETCH_ASSOC);
if ($res != '')
{
 $short = $pdo->query('select short from link where full = "'.$full.'"')->fetch();
}
else{
$short=[makeFile(genShort($_POST['full']),$_POST['full'])];
$pdo->query('INSERT INTO link(full, short) VALUES ("'.$full.'","'.$short[0].'")');
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
     <form action="/Links/index.php" method="post">
     <label for="full">Full link</label><input type="url" name="full" value="<?=$full?>"><br>
        <label for="short">Short Link</label><input type="url" name="short" value="<?=$short[0]?>" readonly><br>
        <input type="submit" name="" value="Submit">
     </form> 
    </body>
</html>
