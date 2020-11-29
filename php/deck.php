<?php

	class Deck{
		
		private $deck;
		
		public function __construct(){
			$deck = new \Ds\Vector;
			
			//Add dominos to deck
			for($i=0; $i<=6; $i++){
				for($j=$i; $j<=6; $j++){
					$domino = new Domino($i,$j);
					$deck -> push($domino);
				}
			}
		}
		
		public function randomize(){
			return $deck -> shuffle();
		}
		
		
		public function size(){
			return $deck -> count();
		}		
		
		public function dealHand(Player $active_player){
			for ($i = 0; $i < $cardsPerHand; $i++) {
				 $active_player -> addDominoToHand(array_pop($deck));
			}
			
		}
    }
?>