<?php
/**
 * Created by PhpStorm.
 * User: aborovkov
 * Date: 11/07/2019
 * Time: 14:55
 */

declare(strict_types=1);

namespace Median\Tests;

use PHPUnit\Framework\TestCase;

class ArrayMedianTest extends TestCase
{
    public function testEmptyArrayReturnsNull()
    {
        $this->assertNull(array_median([]));
    }

    public function testOneElementArrayReturnSelfValue()
    {
        $this->assertEquals(1, array_median([1]));
    }

    public function testTwoElementArrayReturnsAvgValue()
    {
        $this->assertEquals(1.5, array_median([1, 2]));
    }

    public function testFiveElementSortedArrayReturnsCenterValue()
    {
        $this->assertEquals(3, array_median([1,2,3,4,5]));
    }

    public function testTwoZeroArrayReturnZeroAsMedian()
    {
        $this->assertEquals(0, array_median([0,0]));
    }

    public function testFiveShuffledElemReturnsThree()
    {
        $input = [1,2,3,4,5];
        shuffle($input);

        $this->assertEquals(3, array_median($input));

    }
}