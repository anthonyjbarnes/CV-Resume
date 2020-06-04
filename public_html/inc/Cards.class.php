<?php

/**
 * Create a deck of cards with Shapes and Colours
 *
 */

class Cards
{
    public $deck = [];

    public $colours = [];

    public $suits = [];

    public function __construct($colours, $suits)
    {
        $this->colours = $colours;
        $this->suits  = $suits;
    }

    /**
     * Create a single deck of cards.
     *
     * @return array
     */
    public function deck()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->colours as $colour) {
                $this->deck[] = [
                 'id'   => strtolower($colour.'-'.$suit),
                 'name'   => $colour.' '.$suit,
                 'suit'   => strtolower($suit),
                 'colour' => strtolower($colour)
                ];
            }
        }

        return $this->deck;
    }

    /**
     * Creates a Shoe of cards and shuffles
     *
     * @param array $cards
     * @param int $decks
     * @return array
     */
    public function createShoe(int $decks)
    {
        for ($x = 1; $x <= $decks; $x++) {
            $shoe = $this->deck();
        }
        shuffle($shoe);
        return $shoe;
    }

    /**
     * Auto play the game
     * @param array $players
     * @param array $shoe
     * @return array
     */
    public function play(array $players, array $shoe)
    {
        $startTime = microtime(true);
        $count = 0;
        while(count($shoe) > 0){
        //echo "Card Cound: ". count($shoe).'<br>';
            foreach($players as $key => $player){
                if(count($shoe) > 0){
                  $cards = array_rand($shoe, 2);
                  $match = $this->checkCardPair($shoe, $cards);

                  if($match){
                      $win =  count($players[$key]['wins']) + 1;
                      unset($shoe[$cards[0]]);
                      unset($shoe[$cards[1]]);
                      $players[$key]['wins'][$match] = implode(',', $cards);
                  }
                }
                $count ++;
            }

        }

        return array(
            'time' => (microtime(TRUE)-$startTime). ' seconds',
            'turns' => $count,
            'stats' => $players,
            'winner' => $this->getWinner($players)
        );
    }

    /**
     * Check if the selected cards are a matching pair.
     *
     * @param $shoe
     * @param $cards
     * @return bool|mixed
     */
    private function checkCardPair($shoe, $cards)
    {

        if($shoe[$cards[0]]['id'] === $shoe[$cards[1]]['id']){
            return $shoe[$cards[1]]['id'];
        }

        return false;
    }

    /**
     * Return the player with the most wins.
     * @param array $players
     */
    private function getWinner(array $players)
    {
        $orderByWins = [];
        foreach($players as $player){
            $wins =  count($player['wins']);
            $orderByWins[$wins] = $player['name'];
        }
        krsort($orderByWins);

        return reset($orderByWins);;
    }
}