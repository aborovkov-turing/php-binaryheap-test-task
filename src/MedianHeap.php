<?php

namespace Median;

class MedianHeap
{
    private $lower;
    private $greater;

    private $lcounter;
    private $gcounter;

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

        $this->lcounter = 0;
        $this->gcounter = 0;
    }

    /**
     * Total items in heap
     *
     * @return int
     */
    public function count(): int
    {
        return $this->lcounter + $this->gcounter;
    }

    /**
     * Checkes whether heap is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->lcounter == 0 && $this->gcounter == 0;
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
            $this->lcounter++;

        }  else {

            if ($value > $this->median()) {
                $this->greater->insert($value);
                $this->gcounter++;
            } else {
                $this->lower->insert($value);
                $this->lcounter++;
            }

            if (abs($this->lcounter - $this->gcounter) > 1)
                $this->balance();

        }

    }

    private function balance(): void
    {
        $lsize = $this->lcounter;
        $rsize = $this->gcounter;

        if ($lsize > $rsize) {

            $this->greater->insert($this->lower->extract());

            $this->gcounter++;
            $this->lcounter--;

        } else {
            $this->lower->insert($this->greater->extract());

            $this->lcounter++;
            $this->gcounter--;

        }
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

        $lsize = $this->lcounter;
        $gsize = $this->gcounter;

        if ($lsize == $gsize) return ($this->lower->top() + $this->greater->top()) / 2;
        elseif ($lsize > $gsize) return $this->lower->top();
        else return $this->greater->top();
    }
}