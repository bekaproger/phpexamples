<?php 

class Sequence
{
	protected $length;

	protected $sequence = [];

	protected $sorted = false;

	public function __construct(int $length)
	{
		$this->length = $length;
	}

	public function initSequence(callable $generator, bool $clean = true)
	{
		if ($clean) {
			$this->cleanSequence();
		}

		foreach ($generator($this->length) as $value) {
			$this->addNumber($value);
		}

		return $this;
	} 

	public function sortSequence(callable $sort_function = null)
	{
		if (! $sort_function) {
			rsort($this->sequence);
		} else {
		    $this->sequence = $sort_function($this->sequence);
    }

    $this->sorted = true;

		return $this;
	}

	protected function addNumber(int $num)
	{
        if ($key = in_array($num, $this->sequence)) {
            // if we already have this number in sequence we will insert this number into the sequence
            // right next to the copy this number in the sequence
            array_splice($this->sequence, $key, 0 , $num);
        } else {
            $this->sequence[] = $num;
            $this->sorted = false;
        }
	}

	public function getMaxNumbers ( int $m)
    {
        if ( $m <= 0 || empty($this->sequence)) {
            return [];
        }

        $length = count($this->sequence);

        if (! $this->sorted) {
            $this->sortSequence();
        }

        if ($m >= $length) {
            return $this->sequence;
        }

        if ($this->sequence[0] > $this->sequence[$length - 1]) {
            //if sequence is sorted in  descending order get the first m items from sequence
            return array_slice($this->sequence, 0, $m);
        } else {
            // if sequence is sorted in ascending order get the last m items from sequence
            return array_slice($this->sequence, $m * -1);
        }
    }

    public function cleanSequence()
    {
    	$this->sequence = [];
    	$this->sorted = false;

    	return $this;
    }

    public function getSequence()
    {
    	return $this->sequence;
    }
}

$sequence = new Sequence(10);

$digits = function(int $length)
{
    while ($length > 0) {
        yield mt_rand();
        --$length;
    }
};

$sequence->initSequence($digits);

$sequence->sortSequence(function ($arr) {
    sort($arr);
    return $arr;
});

$arr = $sequence->getMaxNumbers(15);

print_r($arr);
