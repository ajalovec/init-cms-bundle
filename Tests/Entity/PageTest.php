<?php
namespace Networking\InitCmsBundle\Tests\Entity;

use \Networking\InitCmsBundle\Entity\Page;

class PageTest extends \PHPUnit_Framework_TestCase
{
	public function testOnPrePersist()
	{
		$obj = new Page();
		$this->assertEquals(null, $obj->getUpdatedAt());
		$obj->onPrePersist();
		$this->assertEquals(new \DateTime('now'), $obj->getUpdatedAt());
		$this->assertEquals(new \DateTime('now'), $obj->getCreatedAt());
	}

	public function testSetTitle()
	{
		$obj = new Page();
		$title = 'hello page';
		$this->assertNull($obj->getTitle());
		$obj->setTitle($title);
		$this->assertEquals($title, $obj->getTitle());
	}

	/**
	 * @covers getParents() setParents() getParent() getTitle()
	 */
	public function testSetParents()
	{
		$obj = new Page();
		$this->assertEquals(array(), $obj->getParents());

		$parent1 = new Page();
		$parent1->setTitle('parent1');
		$parent2 = new Page();
		$parent2->setTitle('parent2');
		$parent3 = new Page();
		$parent3->setTitle('parent3');
		$parents = array($parent1, $parent2, $parent3);
		$obj->setParents($parents);
		$this->assertContainsOnlyInstancesOf('Networking\InitCmsBundle\Entity\Page', $obj->getParents());
		$this->assertEquals('parent1', $obj->getParent(0)->getTitle());
		$this->assertEquals('parent2', $obj->getParent(1)->getTitle());
		$this->assertEquals('parent3', $obj->getParent(2)->getTitle());
	}


	public function testAddChildren()
	{
		$obj = new Page();
		$obj->setTitle('original page');
		$this->assertEquals(null, $obj->getChildren());

		$child1 = new Page();
		$child1->setTitle('child1');
		$obj->addChildren($child1);
		$this->assertContainsOnlyInstancesOf('Networking\InitCmsBundle\Entity\Page', $obj->getChildren());
		$chilly = $obj->getChildren();
		$this->assertEquals('child1', $chilly[0]->getTitle());
		$this->assertEquals('original page', $chilly[0]->getParent()->getTitle());

		$child2 = new Page();
		$child2->setTitle('child2');
		$obj->addChildren($child2);
		$chilly = $obj->getAllChildren();
		$this->assertEquals('child2', $chilly[0]->getTitle()); // new children are first
		$this->assertEquals('original page', $chilly[0]->getParent()->getTitle());
	}

	public function testAddLayoutBlock()
	{

		$this->markTestIncomplete('Tests of Page are incomplete');
	}

}