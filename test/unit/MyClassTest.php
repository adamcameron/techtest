<?php

namespace adamcameron\techtest\tests\unit;

use adamcameron\techtest\MyClass;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass adamcameron\techtest\MyClass */
class MyClassTest extends TestCase
{
    private $myClass;

    protected function setUp(): void
    {
        $this->myClass = new MyClass();
    }

    /** @covers ::needsTesting */
    public function testNeedsTesting()
    {

        $needsTesting = $this->myClass->needsTesting();
        $this->assertTrue($needsTesting);
    }
}
