<?php

use \TE\Detector\CSRF;
use PHPUnit\Framework\TestCase;

class CSRFTest extends TestCase
{
    private $token;

    public function setUp()
    {
      $_SESSION['csrf_token'] = '1234abcd';
    }


    public function testisValidToken()
    {
        $csrf = new CSRF;
        $this->assertTrue($this->invokeMethod($csrf, 'isValidToken', array('1234abcd')));
    }


    public function testgenerateAuthToken()
    {
        $csrf = new CSRF;
        $token = $this->invokeMethod($csrf, 'generateAuthToken');
        $this->assertTrue(strlen($token) == 32);
    }

   /*call the provate methods*/
   public function invokeMethod(&$object, $methodName, array $parameters = array())
   {
       $reflection = new \ReflectionClass(get_class($object));
       $method = $reflection->getMethod($methodName);
       $method->setAccessible(true);

       return $method->invokeArgs($object, $parameters);
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
