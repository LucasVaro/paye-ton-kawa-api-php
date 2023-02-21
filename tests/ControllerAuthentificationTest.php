<?php
// require '../vendor/autoload.php';
// require '../api/Model/constant.php';
require 'api/Model/constant.php';
use PHPUnit\Framework\TestCase;

use Api\Controller\ControllerAuthentification;

final class ControllerAuthentificationTest extends TestCase
{
    public function testPositiveCheckKey(): void
    {
        $mockData = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJrZXkiOiJyZXZlbmRldXJzIiwibWFpbCI6Im5hdGhhbi5vbGl2ZUBlcHNpLmZyIn0.grcN5BDANdrZ68bNK1LUcjgPfA3-hTdvtcigiQ5miY2_u-3rO5tgoqluFyO4wKHhu1I4muSVjLocvpXmpkV0qpAceVA404NGk8Wfq0zvjqG-vSax9me82hUeYF4sgt6KISt69OrnlzQVnWhIYznfHlxnj7eU0oOBGu0sp8V8cCc";
        $expectedResult = true;
        $myClass = new ControllerAuthentification();
        $result = $myClass->checkKey($mockData);
        $this->assertEquals($expectedResult, $result);
    }

    public function testNegativeCheckKey(): void
    {
        $mockData = "eyJ0eXAiOiJKV1QiLCJOiJSUzI1NiJ9.eyJrZXkiOiJyZXZlbmRldXJzIiwibWFpbCI6Im5hdGhhbi5vbGl2ZUBlcHNpLmZyIn0.grcN5BDANdrZ68bNK1LUcjgPfA3-hTdvtcigiQ5miY2_u-3rO5tgoqluFyO4wKHhu1I4muSVjLocvpXmpkV0qpAceVA404NGk8Wfq0zvjqG-vSax9me82hUeYF4sgt6KISt69OrnlzQVnWhIYznfHlxnj7eU0oOBGu0sp8V8cCc";
        $expectedResult = false;
        $myClass = new ControllerAuthentification();
        $result = $myClass->checkKey($mockData);
        $this->assertEquals($expectedResult, $result);
    }
}
