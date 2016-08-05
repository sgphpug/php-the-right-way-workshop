<?php

namespace Tests\Conference;

use Apps\Conference\ConferenceInterface;
use Apps\Conference\PhpAsia2016v1;
use PHPUnit_Framework_TestCase;

class PhpAsia2016v1Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var ConferenceInterface
     */
    protected $conference;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();
        $this->conference = new PhpAsia2016v1();
    }

    public function testListSpeakers()
    {
        $names = $this->conference->listSpeakers();
        $this->assertTrue(in_array('Davey Shafik', $names));
    }
}
