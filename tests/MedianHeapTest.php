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

}
