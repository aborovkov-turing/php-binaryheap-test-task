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
        if ($this->isEmpty()) {

            $this->lower->insert($value);

        }  else {

            if ($value > $this->median()) $this->greater->insert($value);
            else $this->lower->insert($value);

            if (abs($this->lower->count() - $this->greater->count()) > 1)
                $this->balance();

        }

    }

    private function balance(): void
    {
        $lsize = $this->lower->count();
        $rsize = $this->greater->count();

        if ($lsize > $rsize) $this->greater->insert($this->lower->extract());
        else $this->lower->insert($this->greater->extract());
    }

    /**
     * Returns median value
     *
     * @return float
     */
    public function median(): ?float
    {
        if ($this->isEmpty()) return null;
        if ($this->greater->isEmpty()) return $this->lower->top();

        $lsize = $this->lower->count();
        $gsize = $this->greater->count();

        if ($lsize == $gsize) return ($this->lower->top() + $this->greater->top()) / 2;
        elseif ($lsize > $gsize) return $this->lower->top();
        else return $this->greater->top();
    }
}