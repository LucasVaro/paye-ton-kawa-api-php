<?php
use PHPUnit\Framework\TestCase;
use Api\Model\ModelHome;

final class ModelHomeTest extends TestCase
{
    public function testCreateInstanceOfModelHome(): void
    {
        $modelHome = new ModelHome();
        $this->assertInstanceOf(ModelHome::class, $modelHome);
    }

    public function testGetMessage(): void
    {
        $myClass = new ModelHome();
        $result = $myClass->getMessage();
        $this->assertEquals('Welcome to kawa api', $result);
    }
}