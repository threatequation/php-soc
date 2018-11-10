<?php

use \TE\Detector\Protect;
use PHPUnit\Framework\TestCase;

class ProtectTest extends TestCase
{

    private $protect = null;

    public function setUp()
    {

        $this->protect = new Protect($this->init);
    }

    public function testHTMLpurify()
    {
        $this->assertEquals('<p>Hello</p>', $this->protect->HTMLpurify('<p>Hello</p>'));
        $this->assertEquals('"&gt;<p>Hello</p>', $this->protect->HTMLpurify('"><p>Hello</p>'));
        $this->assertEquals('&lt;? foo="&gt;"&gt;', $this->protect->HTMLpurify('<? foo="><script>alert(1)</script>">'));
        $this->assertEmpty($this->protect->HTMLpurify('<script>alert(123)</script>'));
    }


     public function testGetStorage()
    {
        $test = new Monitor(
          $this->init,
          array(),
          new Report($this->init)
      );
        $this->assertInstanceOf('TE\Detector\Filter\Storage', $test->getStorage());
    }

    public function testDetect()
    {
        $test = new Monitor(
          $this->init,
          array(),
          new Report($this->init)
      );
        $arr = $this->invokeMethod($test, 'detect', array('', '<a/onmouseover=alert(document.cookie) href="http://www.google.de/">Google</a>'));
        $this->assertTrue(sizeof($arr) > 1);
    }
    

}
