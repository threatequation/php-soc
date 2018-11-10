<?php

namespace TE\Detector;

use \TE\Init;
use PHPUnit\Framework\TestCase;

class InitTest extends TestCase
{

    public function setUp()
    {
        
    }
     
     /**
     * Test environment variable
     * @test
     */
    public function testEnv()
    {
        $keys = array('filter_path','log_file','HTML_Purifier_Cache','client_id', 'exceptions', 'excludeHTMLtag');
        $this->assertEquals($keys, array_keys(Init::env()));
    }

    /**
     * Test get environment variable
     * @test
     */

    public function testGetEnv(){
        $this->assertEquals(Init::getEnv('filter_path'), '/var/www/html/threatequationphp/lib/Detector/default_filter.json');
        $this->assertEquals(strlen(Init::getEnv('client_id')) , 32);
    }

    /**
     * Test set environment variable
     * @test
     */

    public function testSetEnv(){
        $filter_path = Init::setEnv('filter_path', 'my filter file location');
        $this->assertEquals(Init::getEnv('filter_path'), $filter_path);
        
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
