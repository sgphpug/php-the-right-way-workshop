<?php

namespace Apps\Conference;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class PhpAsia2016v1 implements ConferenceInterface
{
    /**
     * @inheritdoc
     */
    public function listSpeakers()
    {
        $guzzle = new Client();
        $url = 'https://2016.phpconf.asia';
        $response = $guzzle->request('get', $url)->getBody()->getContents();

        $crawler = new Crawler($response);
        $nodes = $crawler->filter('.offset-l1 h4');

        $names = [];
        foreach ($nodes as $node) {
            /** @var \DOMElement $node */
            $names[] = $node->textContent;
        }
        natsort($names);

        return $names;
    }
}
