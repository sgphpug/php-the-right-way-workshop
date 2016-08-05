<?php

namespace Apps\Controller;

use Apps\Conference\PhpAsia2016v1;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ConferenceV2 extends AbstractController
{
    protected $container;

    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
    }

    public function speakers()
    {
        /** @var PhpAsia2016v1 $conference */
        $conference = $this->container->get('Conference');
        return $conference->listSpeakers();
    }
}
