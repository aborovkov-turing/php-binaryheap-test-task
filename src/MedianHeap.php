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

    /**
     * MedianHeap constructor.
     */
    public function __construct()
    {
        $this->greater = new \SplMinHeap();
        $this->lower = new \SplMaxHeap();
    }

    /**
     * Total items in heap
     *
     * @return int
     */
    public function count(): int
    {
        return $this->greater->count() + $this->lower->count();
    }

    /**
     * Checkes whether heap is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->lower->isEmpty() && $this->greater->isEmpty();
    }

    /**
     * Inserts value in heap
     *
     * @param int $value
     */
    public function insert(int $value): void
    {
        if($this->isEmpty()) {

            $this->lower->insert($value);

        } elseif($this->greater->isEmpty()) {

            $this->greater->insert($value);
            $this->swap();

        } else {

        }

    }

    private function swap()
    {
        if($this->lower->top() > $this->greater->top())
            [$this->lower, $this->greater] = [$this->greater, $this->lower];
    }

    /**
     * Returns median value
     *
     * @return float
     */
    public function median(): ?float
    {
        if($this->isEmpty()) return null;
        if($this->greater->isEmpty()) return $this->lower->top();

        $lsize = $this->lower->count();
        $gsize = $this->greater->count();

        if($lsize == $gsize) return ($this->lower->top() + $this->greater->top()) / 2;

    }


}