<?php

namespace Median;

class MedianHeap
{
    private $lower;
    private $greater;

    /**
     * Fills MediaHeap with given data.
     *
     * @param array $input
     * @return MedianHeap
     */
    public static function build(array $input = []): self
    {
        $heap = new self();

        foreach ($input as $value) {
            $heap->insert($value);
        }

        return $heap;
    }

    public function __construct()
    {
        $this->greater = new \SplMinHeap();
        $this->lower = new \SplMaxHeap();
    }

    public function count(): int
    {

    }

    public function isEmpty(): bool
    {
        return $this->lower->isEmpty() && $this->greater->isEmpty();
    }

    public function insert(int $value)
    {

    }

    public function median(): float
    {

    }


}