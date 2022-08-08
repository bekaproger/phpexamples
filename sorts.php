<?php

class BubbleSort {
	public static function sort($arr) {
		$size = count($arr);
		for ($j = 0; $j < $size; $j++) {
			for ($i = 0; $i < $size - $j - 1; $i++) {
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
	    $k = 0;
	    $l1 = count($arr1);
	    $l2 = count($arr2);
	    $arr = [];
	    for ($i = 0; $i < $l1; $i++) {
	    	while ($k < $l2 && $arr1[$i] >= $arr2[$k]) {
	    		$arr[] = $arr2[$k];
	    		$k++;
	    	}

	    	$arr[] = $arr1[$i];
	    }

	    while ($k < $l2) {
	    	$arr[] = $arr2[$k++];
	    }

	    return $arr;
	} 
}

class SelectionSort 
{
	public static function sort($arr) 
	{
		$len = count($arr);
		if ($len <= 1) {
			return $arr;
		} 

		for ($i = 0; $i < $len; $i++) {
			$minIndex = $i;
			for ($j = $i + 1; $j < $len; $j++) {
				if ($arr[$minIndex] > $arr[$j]) {
					$minIndex = $j;
				}
			}
			$el = $arr[$minIndex];
			$arr[$minIndex] = $arr[$i];
			$arr[$i] = $el;
		}


		return $arr;
	}
}

class InsertionSort
{
	public static function sort($arr) 
	{
		$len = count($arr);
		if ($len <= 1) {
			return $arr;
		} 

		for ($i = 1; $i < $len; $i++) {
			$j = $i;
			while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
				$el = $arr[$j];
				$arr[$j] = $arr[$j - 1];
				$arr[$j - 1] = $el;
				$j--;
			}
		}

		return $arr;
	}
}

class QuickSort
{
	public static function sort($arr)
	{
		return self::quickSort($arr, 0, count($arr) - 1);
	}

	private static function quickSort(&$arr, $low, $high) 
	{
		if ($low < $high) {
			$pivot = $arr[floor(($low + $high) / 2 )];
			$i = self::partition($arr, $low, $high, $pivot);
			self::quickSort($arr, $low, $i-1);
			self::quickSort($arr, $i, $high);
		}

		return $arr;
	}

	private static function partition(&$arr, $low, $high, $pivot)
	{
		while ($low < $high) {
			while ($arr[$low] < $pivot) {
				$low++;
			}

			while ($arr[$high] > $pivot) {
				$high--;
			}

			self::swap($arr, $low, $high);
			$low++;
			$high--;
		}

		return $low;
	}


	private static function swap(&$arr, $first, $second) 
	{
		if ($first !== $second) {
			$el = $arr[$first];
			$arr[$first] = $arr[$second];
			$arr[$second] = $el;
		}
	}
}

class ShellSort
{
	public static function sort($arr)
	{
		for ($d = floor(count($arr) / 2); $d > 0; $d = floor($d / 2)) {
			for ($i = 0; $i + $d < count($arr); $i++) {
				$j = $i + $d;
				while ($j > 0 && $arr[$j] < $arr[$j - $d]) {
					$el = $arr[$j];
					$arr[$j] = $arr[$j - $d];
					$arr[$j - $d] = $el;
					$j -= $d;
				}
			}
		}

		return $arr;
	}
}

// var_export(BubbleSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));
// var_export(MergeSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));
// var_export(SelectionSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));
// var_export(InsertionSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));
// var_export(QuickSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));
var_export(ShellSort::sort([-900,500,100123,9,8,7,5,4,3,3,3,3,3,2,1,1,1,1,1,1,1,1]));