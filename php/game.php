<?php
	
	class Game{
		
		private $gameID;
		private $playerNames;
		private $playersTurns;
		private $firstDomino;
		
		
		public function __construct(){
			$playersTurns = new \Ds\Vector;
		}

		public function start(array $playerNames){
				$deck = new Deck();
				$board = new Board();
				$deck -> randomize();
				
				createPlayers($playerNames,$deck);

				$firstPlayer = chooseWhoPlaysFirst($playersTurns);
				$firstDomino = $board -> firstDomino();
		}

		private function chooseWhoPlaysFirst(Vector $playersTurns){
			$position = mt_rand(0, $playersTurns->count());
			$choosenPlayer = $playersTurns -> remove($position);
			$playersTurns -> unshift($player);
			return $choosenPlayer;
		}
	
		private function firstDomino(Board $board){
			$chosenDomino = $deck -> array_pop();
			$board -> addLeft($chosenDomino);
			return $chosenDomino;
		}
		
		private function createPlayers(array $playerNames,Deck $deck){
			for($i=0; $i<=1; $i++){
				$player = new Player($playerNames);
				$playersTurns -> push($player);
				$hand = $deck -> dealHand($player);			
			}
		}
	}
?>