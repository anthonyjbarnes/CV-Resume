<?php

require "inc/Cards.class.php";

$decks = 2;

$colours = ['Red', 'Blue', 'Green', 'Yellow'];
$suits  = ['Square', 'Circle', 'Triangle', 'Oval'];


$cards =  new Cards($colours, $suits);

$deck = $cards->deck();

$shoe = $cards->createShoe($decks);

?>

<!DOCTYPE html>
<html>
<head>
<title>Card Game</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="deck">
    <?php foreach($shoe as $card){?>
     <div class="card">

        <?php echo $card ;?>
     </div>
    <?php } ?>
</div>
<script type="text/javascript" async="" src="js/script.js"></script>

</body>
</html>