<?php

namespace Tests\Conference;

use Apps\Conference\ConferenceInterface;
use Apps\Conference\PhpAsia2016v2;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DomCrawler\Crawler;

class PhpAsia2016v2Test extends PHPUnit_Framework_TestCase
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
        $mockClient = $this->getMockBuilder(Client::class)->setMethods(['request'])->getMock();
        $mockResponse = $this->getMockBuilder(Promise::class)
            ->disableOriginalConstructor()
            ->setMethods(['getBody', 'getContents'])
            ->getMock();

        $mockClient->expects($this->once())->method('request')->willReturn($mockResponse);
        $mockResponse->expects($this->once())->method('getBody')->willReturn($mockResponse);
        $mockResponse->expects($this->once())->method('getContents')->willReturn('
            <div class="offset-l1">
                <h4>Davey Shafik</h4>
            </div>
        ');
        $this->conference = new PhpAsia2016v2($mockClient, new Crawler());
    }

    public function testListSpeakers()
    {
        $names = $this->conference->listSpeakers();
        $this->assertTrue(in_array('Davey Shafik', $names));
    }
}
