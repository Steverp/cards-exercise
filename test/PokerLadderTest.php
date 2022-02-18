<?php

require_once './class/PokerLadder.php';

use PHPUnit\Framework\TestCase;

class PokerLadderTest extends TestCase
{
    public function testAlgorithm() {

        $pokerLadderClass = new PokerLadder;

        $results1 = $pokerLadderClass->isStraight([2, 3, 4 ,5, 6]);
        $this->assertEquals(true, $results1, "2, 3, 4 ,5, 6");
        $results2 = $pokerLadderClass->isStraight([14, 5, 4 ,2, 3]);
        $this->assertEquals(true, $results2, "14, 5, 4 ,2, 3");
        $results3 = $pokerLadderClass->isStraight([7, 7, 12 ,11, 3, 4, 14]);
        $this->assertEquals(false, $results3, "7, 7, 12 ,11, 3, 4, 14");
        $results4 = $pokerLadderClass->isStraight([7, 3, 2]);
        $this->assertEquals(false, $results4, "7, 3, 2");
    }
}