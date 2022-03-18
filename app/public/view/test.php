
<?php

require_once('navigation.php');

require_once('../model/user.php');

require_once('../controller/testcontroller.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    $users = [];

    $testcontroller = new TestController();

    $users = (array)$testcontroller->index();



    foreach ($users as $user) {;

//var_dump($users)

    ?>

        <tr>



            <?php echo $user->getFirstName(); ?>

          <?php echo  $user->getEmail(); ?>





        </tr>


        


    <?php

    }

    ?>
</body>

</html>