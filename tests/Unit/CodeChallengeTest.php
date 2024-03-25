<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class CodeChallengeTest extends TestCase
{
    public function testThatFunctionGeneratesCorrectResults(): void
    {
        $this->assertEquals(getCoinBalances(['share'], ['share']), [5, 5]);
        $this->assertEquals(getCoinBalances(['steal'], ['share']), [6, 2]);
        $this->assertEquals(getCoinBalances(['share'], ['steal']), [2, 6]);
        $this->assertEquals(getCoinBalances(['steal'], ['steal']), [3, 3]);

        $this->assertEquals(getCoinBalances(['share', 'share', 'share'], ['steal', 'share', 'steal']), [3, 11]);
        $this->assertEquals(getCoinBalances(['share', 'share', 'steal', 'share'], ['steal', 'steal', 'steal', 'steal']),
            [0, 12]);
        $this->assertEquals(getCoinBalances(['steal', 'steal', 'steal'], ['share', 'share', 'share']), [12, 0]);
        $this->assertEquals(getCoinBalances(['share', 'share'], ['share', 'share']), [7, 7]);
        $this->assertEquals(getCoinBalances(['share', 'steal', 'steal', 'steal'], ['share', 'share', 'steal', 'share']),
            [11, 3]);
        $this->assertEquals(getCoinBalances(['share', 'share', 'steal', 'share'], ['steal', 'share', 'steal', 'steal']),
            [3, 11]);
        $this->assertEquals(getCoinBalances(['steal', 'steal', 'steal', 'steal'], ['steal', 'steal', 'steal', 'steal']),
            [3, 3]);
        $this->assertEquals(getCoinBalances(['steal', 'share', 'steal', 'steal'], ['share', 'share', 'steal', 'steal']),
            [8, 4]);
        $this->assertEquals(getCoinBalances(['steal', 'steal'], ['share', 'share']), [9, 1]);
        $this->assertEquals(getCoinBalances(['steal', 'share'], ['share', 'steal']), [5, 5]);
    }
}