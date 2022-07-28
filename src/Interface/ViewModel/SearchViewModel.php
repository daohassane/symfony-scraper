<?php

namespace App\Interface\ViewModel;

class SearchViewModel
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