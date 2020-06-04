<?php

require "inc/Cards.class.php";

$decks = 2;

$colours = ['Red', 'Blue', 'Green', 'Yellow'];
$suits = ['Square', 'Circle', 'Triangle', 'Oval'];

$players = [
    ['id' => 1, 'name' => 'Team CV Lib', 'wins' => []],
    ['id' => 2, 'name' => 'Team CV Res', 'wins' => []]
];

$cards = new Cards($colours, $suits);

$shoe = $cards->createShoe($decks);

$game = $cards->play($players, $shoe);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Card Game</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="header">
    <h1>Card Game</h1>
</div>
<div class="deck">
    <?php foreach ($shoe as $card) { ?>
        <div class="container">
            <div class="card" onclick="flip(event)">
                <div class="front">
                    <h1>CV <br> Library</h1>
                </div>
                <div class="back">
                    <h2 class="name"><?php echo $card['name']; ?></h2>
                    <div class="shape <?php echo strtolower($card['name']); ?>">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="game">
    <pre class="output">
        <?php print_r($game); ?>
    </pre>
</div>
<script type="text/javascript" async="" src="js/script.js"></script>

</body>
</html>