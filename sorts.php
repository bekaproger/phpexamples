<?php

class BubbleSort {
	public static function sort($arr) {
		$withSwap = true;
		while ($withSwap) {
			$withSwap = false;
			for ($i = 0; $i < count($arr) - 1; $i++) {
				if ($arr[$i] > $arr[$i+1]) {
					$el = $arr[$i];
					$arr[$i] = $arr[$i+1];
					$arr[$i+1] = $el;
					$withSwap = true; 
				}
			}
		}

		return $arr;
	}
}

class MergeSort {
	public static function sort($arr) 
	{
		if (count($arr) < 2) {
			return $arr;
		} elseif (count($arr) === 2) {
			$f = $arr[0];
			$s = $arr[1];
			$arr[0] = min($f, $s);
			$arr[1] = max($f, $s);

			return $arr;
		}

		$mid = (int)floor(count($arr) / 2);
		$arr1 = [];
		$arr2 = [];

		for ($i = 0; $i < count($arr); $i++) {
			if ($i < $mid) {
				$arr1[] = $arr[$i];
			} else {
				$arr2[] = $arr[$i];
			}
		}

		return self::merge(self::sort($arr1), self::sort($arr2));
	}

	private static function merge($arr1, $arr2) {
		$j = 0;
	    $k = 0;
	    $l1 = count($arr1);
	    $l2 = count($arr2);
	    $arr = [];

	    for ($i = 0; $i < $l1 + $l2; $i++) {
	        if ($k === $l2) {
	            $arr[] = $arr1[$j];
	            $j++;
	        } elseif ($j === $l1) {
	            $arr[] = $arr2[$k];
	            $k++;
	        } elseif ($arr1[$j] < $arr2[$k]) {
	            $arr[] = $arr1[$j];
	            $j++;
	        } elseif ($arr1[$j] > $arr2[$k]) {
	            $arr[] = $arr2[$k];
	            $k++;
	        } else {
	            $arr[] = $arr1[$j];
	            $arr[] = $arr2[$k];
	            $j++;
	            $k++;
	        }
	    }

	    return $arr;
	} 
}

var_dump(BubbleSort::sort([-900,500,100123,9,8,7,5,4,3,2,1]));
var_dump(MergeSort::sort([-900,500,100123,9,8,7,5,4,3,2,1]));