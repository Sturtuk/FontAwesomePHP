<?php

namespace Khill\Fontawesome\Tests;

class FontAwesomeCollectionTest extends FontAwesomeTestCase
{
    public function testRetrievingStoredIconFromCollectionOutput()
    {
        $this->fa->icon('cog')->store('loginIcon');

        $this->expectOutputString('<i class="fa fa-cog"></i>');

        echo $this->fa->collection('loginIcon');
    }

    public function testRetrievingCustomizedStoredIconFromCollectionOutput()
    {
        $this->fa->x4('cog')->flipVertical()->store('myLabel');

        $this->expectOutputString('<i class="fa fa-cog fa-4x fa-flip-vertical"></i>');

        echo $this->fa->collection('myLabel');
    }

    /**
     * @depends testRetrievingStoredIconFromCollectionOutput
     */
    public function testStoringAndFetchingIconWithCustomAttributeOutput()
    {
        $this->fa->icon('rocket')->addAttr('title', 'Tooltips!')->store('mine');

        $this->expectOutputString('<i class="fa fa-rocket" title="Tooltips!"></i>');

        echo $this->fa->collection('mine');
    }

    /**
     * @expectedException \Khill\Fontawesome\Exceptions\BadLabelException
     */
    public function testStoringIconIntoCollectionWithBadLabel()
    {
        $this->fa->icon('cog')->store(4.1);
    }

    /**
     * @expectedException \Khill\Fontawesome\Exceptions\BadLabelException
     */
    public function testRetrievingIconFromCollectionWithBadLabel()
    {
        $this->fa->icon('cog')->store('loginIcon');

        echo $this->fa->collection(4.1);
    }
}
