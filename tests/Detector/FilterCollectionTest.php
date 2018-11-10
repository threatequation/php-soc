<?php
namespace TE\Detector;


use \TE\Detector\Filter;
use \TE\Detector\FilterCollection;
use PHPUnit\Framework\TestCase;

class FilterCollectionTest extends TestCase
{
    
    private $FilterCollection;

    public function setUp()
    {
       $this->FilterCollection = new FilterCollection();
    }


    public function testGetFilterSet(){
        $this->assertTrue(is_array($this->FilterCollection->getFilterSet()));
        $this->assertInstanceOf('\\TE\Detector\Filter', $this->FilterCollection->getFilterSet()[1]);
    }


    public function testSetFilterSet(){
        $filterSize = sizeof($this->FilterCollection->getFilterSet());
        $this->FilterCollection->setFilterSet(array( new Filter(100, '^test$', 'My description', array('foo', 'bar'), 12)));
        $filterSizeafter= sizeof($this->FilterCollection->getFilterSet());

        $this->assertEquals($filterSize + 1, $filterSizeafter);

    }


    public function testAddFilter(){
        $filterSize = sizeof($this->FilterCollection->getFilterSet());
        $this->FilterCollection->addFilter(new Filter(101, '^testadd$', 'My description', array('foo', 'bar'), 12));
        $filterSizeafter= sizeof($this->FilterCollection->getFilterSet());

        $this->assertEquals($filterSize + 1, $filterSizeafter);

    }

   
}
