<?php
	namespace Exam\Controller;

	class Exam {

		protected $type1;
		protected $type2;
		protected $type3;

		public function __construct($num) {
			$this->type1	= (int)($num/2);
			$this->type2	= (int)(($num - $this->type1)/2);
			$this->type3	= $num - $this->type1 - $this->type2;
		}

		public function randomPositionChoice($min, $max, $quantity) {
			$numbers = range($min, $max);
			shuffle($numbers);
			return array_slice($numbers, 0, $quantity);
		}

		public function splitAnswer($answer) {
			$answers = explode('&', $answer);
			return $answers;
		}

		public function getChoice($choice, $i) {
			switch ($i) {
				case 1: return $choice->choice_1;
				case 2: return $choice->choice_2;
				case 3: return $choice->choice_3;
				case 4: return $choice->choice_4;
			}
		}

		public function mixChoice($choice, $p) {
			$choice_1	= $this->getChoice($choice, $p[0]);
			$choice_2	= $this->getChoice($choice, $p[1]);
			$choice_3	= $this->getChoice($choice, $p[2]);
			$choice_4	= $this->getChoice($choice, $p[3]);

			$choice->choice_1	= $choice_1;
			$choice->choice_2	= $choice_2;
			$choice->choice_3	= $choice_3;
			$choice->choice_4	= $choice_4;
			return $choice;
		}

		public function randomPosition($arrChoice, $arrAnswer) {
			for ($i=1; $i<=$this->type1; $i++)
				$newAnswer[$i-1]	= $arrAnswer[$i-1];

			for ($i= $this->type1+1; $i<= $this->type1 + $this->type2 + $this->type3; $i++) {
				$position	= $this->randomPositionChoice(1, 4, 4);
				$arrChoice[]	= $this->mixChoice($arrChoice[$i - $this->type1 - 1], $position);
				if ($i <= $this->type1 + $this->type2) {
					$answers	= $this->splitAnswer($arrAnswer[$i-1]);
					for($j=0; $j<count($answers); $j++)
						for ($k=0; $k<=3; $k++)
							if ($answers[$j] == $position[$k]) {
								$answers[$j]	= $k+1;
								break;
							}
					$ans	= "";
					sort($answers);
					foreach ($answers as $item)
						if ($ans == "")
							$ans	= $item;
						else
							$ans	= $ans."&".$item;
					$newAnswer[$i-1]	= $ans;
				}
				else {
					for ($k=0; $k<=3; $k++)
						if ($arrAnswer[$i-1] == $position[$k]) {
							$newAnswer[$i-1]	= $k+1;
							break;
						}
				}
			}
			$result	= array($arrChoice, $newAnswer);
			return $result;
		}
	}