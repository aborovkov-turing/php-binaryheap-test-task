<?php

require_once 'BaseCase.php';

/**
 * @\PhpBench\Benchmark\Metadata\Annotations\BeforeMethods({"generateRandomArr"})
 * Class ArrayMedianSolutionBench
 */
class AllEqualsExceptOneBench extends BaseCase
{
    private $data;

    public function generateRandomArr()
    {
        $this->data = [];

        for($i = $this->items; $i > 0; $i--) {
            $this->data[] = 1;
        }

        $this->data[] = 2;
    }

    /**
     * @\PhpBench\Benchmark\Metadata\Annotations\Revs(1)
     */
    public function benchQuickSort()
    {
        array_median($this->data);
    }
    /**
     * @\PhpBench\Benchmark\Metadata\Annotations\Revs(1)
     */
    public function benchHeap()
    {
        Median\MedianHeap::build($this->data)->median();
    }
}
