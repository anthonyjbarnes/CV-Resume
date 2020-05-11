<?php

/**
 * Create a deck of cards with Shapes and Colours
 *
 */

class Cards
{

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
                $this->deck[] = strtolower($suit.'-'.$colour);
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
        $cards = $this->deck();
        $total_cards = (count($cards) * $decks);

        $shoe = $cards;
        shuffle($shoe);

        return $shoe;
    }
}