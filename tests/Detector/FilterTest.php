<?php

namespace TE\Detector;


use PHPUnit\Framework\TestCase;

use \TE\Detector\Filter;

class FilterTest extends TestCase
{
    public function setUp()
    {
        
    }

    /**
    *   check filter related function
    * @test
    */
    public function testObjectConstruction()
    {
        $filter = new Filter(1, '^test$', 'My description', array('foo', 'bar'), 12);

        $this->assertTrue($filter->match('test'));
        $this->assertEquals('My description', $filter->getDescription(), 'Should return description');
        $this->assertEquals(array('foo', 'bar'), $filter->getTags(), 'Should return array/list of tags');
        $this->assertEquals('^test$', $filter->getRule());
        $this->assertEquals(12, $filter->getImpact());
    }

    /**
    *Test match function
    * @test
    */
    public function testMatch()
    {
        $filter = new Filter(1, '^te.st$', 'My description', array('tag1', 'tag2'), 1);

        // Default must be
        // ... case-insensitive
        $this->assertTrue($filter->match('TE1ST'));
        // ... dot all (\n is matched by .)
        $this->assertTrue($filter->match("TE\nST"));
        // .. "$" is end only #has changed since modifiers are ims
        $this->assertTrue($filter->match("TE1ST\n"));
    }

    /**
    * match function must take an string
    * @invalidArgumentException
    */

    public function testInvalidArgumentOnMatch()
    {
        $this->setExpectedException('InvalidArgumentException');
        $filter = new Filter(1, '^test$', 'My description', array('foo', 'bar'), 10);
        $filter->match(1);
    }

    /**
    * impact argument must be an integer
    * @skipped 
    */

    public function testInvalidArgumentInFilterInstanciation1()
    {
        $this->markTestSkipped('The values are not validated properly on instanciation');
        $this->setExpectedException('InvalidArgumentException');
        new Filter(1, '^test$', 'my desc', array('foo'), 'test');
    }

    /**
    * impact argument must be an integer
    * @skipped 
    */

    public function testInvalidArgumentInFilterInstanciation2()
    {
        $this->markTestSkipped('The values are not validated properly on instanciation');
        $this->setExpectedException('InvalidArgumentException');
        new Filter(1, 1, 'my desc', array('foo'), 'bla');
    }


    /**
     * Test that the output of the data in an array is correct
     * 
     * @covers Filter::toArray
     */
    public function testOutputAsArray()
    {
        $data = array(
            'id' => 1,
            'rule' => '^te.st$',
            'description' => 'My description',
            'tags' =>'tag1, tag2',
            'impact' => 1
        );
        $filter = new Filter(1, '^te.st$', 'My description', array('tag1', 'tag2'), 1);

        $this->assertEquals(
            $filter->toArray(), $data
        );
    }

    
}
