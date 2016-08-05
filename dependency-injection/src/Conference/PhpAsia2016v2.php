<?php

namespace Apps\Conference;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class PhpAsia2016v2
 * @package Apps\Conference
 */
class PhpAsia2016v2 implements ConferenceInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * PhpAsia2016v2 constructor.
     * @param Client $client
     * @param Crawler $crawler
     */
    public function __construct(Client $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    /**
     * @inheritdoc
     */
    public function listSpeakers()
    {
        $url = 'https://2016.phpconf.asia';
        $response = $this->client->request('get', $url)->getBody()->getContents();
        $this->crawler->addContent($response);
        $nodes = $this->crawler->filter('.offset-l1 h4');

        $names = [];
        foreach ($nodes as $node) {
            /** @var \DOMElement $node */
            $names[] = $node->textContent;
        }
        natsort($names);

        return $names;
    }
}
