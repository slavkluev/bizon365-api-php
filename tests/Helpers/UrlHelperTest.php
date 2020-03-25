<?php

namespace slavkluev\Bizon365\Helpers;

use PHPUnit\Framework\TestCase;

class UrlHelperTest extends TestCase
{
    public function testBuild()
    {
        $this->assertEquals(
            'https://test.test/test?param1=value1',
            UrlHelper::build('https://test.test/test', ['param1' => 'value1'])
        );
        $this->assertEquals(
            'https://test.test/test?param1=value1&param2=value2',
            UrlHelper::build('https://test.test/test', ['param1' => 'value1', 'param2' => 'value2'])
        );
        $this->assertEquals(
            'https://test.test/test?param1=value1',
            UrlHelper::build('https://test.test/test', ['param1' => 'value1', 'param2' => null])
        );
    }
}
