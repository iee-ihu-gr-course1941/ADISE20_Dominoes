<?php

	class Board{

		public $board;
		public $leftSide;
		public $rightSide;
		
		public function __construct(){
			$board = new \Ds\Deque; #doubled edged queue
		}
		
		public function addLeft(Domino $chosenDomino){
			$this -> board -> unshift($chosenDomino); //add to the start
			$leftSide = $chosenDomino -> getLeftSide();
		}
		
		public function addRight(Domino $chosenDomino){
			$this -> board -> push($chosenDomino); //add to the end
			$rightSide = $chosenDomino -> getRightSide();
		}
		
		
		public function firstDomino(){
			
		}
		
		#TODO:add print
	}
?>