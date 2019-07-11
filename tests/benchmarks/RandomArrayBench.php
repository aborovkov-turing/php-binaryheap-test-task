<?php

require_once 'BaseCase.php';

/**
 * @\PhpBench\Benchmark\Metadata\Annotations\BeforeMethods({"generateRandomArr"})
 * Class ArrayMedianSolutionBench
 */
class RandomArrayBench extends BaseCase
{
    private $data;

    public function generateRandomArr()
    {
        $this->data = [];

        for($i = 0; $i < $this->items; $i++) {
            $this->data[] = rand(0, PHP_INT_MAX);
        }
    }

    /**
     * @\PhpBench\Benchmark\Metadata\Annotations\Revs(10)
     */
    public function benchQuickSort()
    {
        array_median($this->data);
    }
    /**
     * @\PhpBench\Benchmark\Metadata\Annotations\Revs(10)
     */
    public function benchHeap()
    {
        Median\MedianHeap::build($this->data)->median();
    }
}
