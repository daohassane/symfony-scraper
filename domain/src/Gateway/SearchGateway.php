<?php

namespace AMA\Domain\Gateway;

interface SearchGateway
{
    /**
     * @param string $query
     * @return array
     */
    public function getSearchResults(string $query): array;
}