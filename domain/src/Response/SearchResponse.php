<?php

namespace AMA\Domain\Response;

class SearchResponse
{
    private array $results = [];

    /**
     * @param array $results
     */
    public function __construct(array $results)
    {
        $this->results = $results;
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }
}