<?php

namespace Apps\Controller;

use Apps\Conference\PhpAsia2016v1;

class ConferenceV1 extends AbstractController
{
    protected $conference;

    public function __construct(PhpAsia2016v1 $conference)
    {
        parent::__construct();
        $this->conference = $conference;
    }

    public function speakers()
    {
        return $this->conference->listSpeakers();
    }
}
