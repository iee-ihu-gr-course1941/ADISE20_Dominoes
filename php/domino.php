<?php

	class Domino{
	
		public $left;
		public $right;
		public $flip;

		
		public function __construct(int $left, int $right){
			$this -> left = $left;
			$this -> right = $right;
		}
		
		public function getDomino(){
			return [$left, $right];
		}

		public function flipIt(){
			$left = $temp;
			$left = $right;
			$right = $temp;
			
			if ($flip = FALSE){
				$flip = TRUE;
			}else{
				$flip = FALSE;
			}
		}

		public function printDomino(){
			return ('[' . $left . ':' . $right . ']');
		}

	
	}
	
?>