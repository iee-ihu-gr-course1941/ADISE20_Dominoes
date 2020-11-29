<?php

	class Player{
	
		public $name;
		private $hand;
		
		public function __construct(){
			$hand = new \Ds\Vector();
		}
		
		public function getHand(){
			return $hand;
		}
		
		
		public function handSize(){
			return $hand -> count();
		}
		
		public function addDominoToHand(domino $chosenDomino){
			$hand -> push($chosenDomino);
		}		

		#TODO: print hands
		
	}
?>