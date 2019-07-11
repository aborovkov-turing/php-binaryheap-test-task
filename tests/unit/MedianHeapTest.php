<?php
/**
 * Created by PhpStorm.
 * User: aborovkov
 * Date: 11/07/2019
 * Time: 14:55
 */

declare(strict_types=1);

namespace Median\Tests;

use Median\MedianHeap;
use PHPUnit\Framework\TestCase;

class MedianHeapTest extends TestCase
{

    public function testEmptyBuildCreatesEmptyHeap()
    {
        $this->assertTrue((MedianHeap::build())->isEmpty());
    }

    public function testSingleElementBuildCreatesNonEmptyHeap()
    {
        $this->assertFalse((MedianHeap::build([1]))->isEmpty());
    }

    public function testEmptyHeapCountEqualsZero()
    {
        $this->assertEquals(0, (MedianHeap::build())->count());
    }

    public function testSingleElementHeapCountEqualsOne()
    {
        $this->assertEquals(1, (MedianHeap::build([1]))->count());
    }

    public function testTwoElementsHeapReturnsCountTwo()
    {
        $this->assertEquals(2, (MedianHeap::build([1,1]))->count());
    }

    public function testEmptyArrayReturnsNull()
    {
        $this->assertNull((MedianHeap::build([]))->median());
    }

    public function testOneElementArrayReturnSelfValue()
    {
        $this->assertEquals(1, (MedianHeap::build([1]))->median());
    }

    public function testTwoElementArrayReturnsAvgValue()
    {
        $this->assertEquals(1.5, (MedianHeap::build([1,2]))->median());
    }

    public function testThreeElementArrayReturnsCenterValue()
    {
        $this->assertEquals(2, (MedianHeap::build([1,2,3]))->median());
    }

    public function testFiveElementSortedArrayReturnsCenterValue()
    {
        $this->assertEquals(3, (MedianHeap::build([1,2,3,4,5]))->median());
    }

    public function testTwoZeroArrayReturnZeroAsMedian()
    {
        $this->assertEquals(0,(MedianHeap::build([0,0]))->median());
    }

    public function testFiveShuffledElemReturnsThree()
    {
        $input = [1,2,3,4,5];
        shuffle($input);

        $this->assertEquals(3, (MedianHeap::build($input))->median());
    }

    public function test99ShuffeledReturns50()
    {
        $input = range(1, 99);
        shuffle($input);
        $this->assertEquals(50, (MedianHeap::build($input))->median());
    }
}
