<?php

namespace Apps\Conference;

/**
 * Interface Conference
 */
interface ConferenceInterface
{
    /**
     * List of conference speakers in alphabetical order
     *
     * @return array
     */
    public function listSpeakers();
}
