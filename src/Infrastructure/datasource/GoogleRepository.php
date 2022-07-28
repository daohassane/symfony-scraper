<?php

namespace App\Infrastructure\datasource;

use AMA\Domain\Entity\Result;
use AMA\Domain\Gateway\SearchGateway;
use App\Infrastructure\services\GoogleService;
use App\Infrastructure\services\IGoogleService;
use Goutte\Client;


class GoogleRepository implements SearchGateway
{

    public function getSearchResults(string $query): array
    {
        return $this->scrap(new GoogleService(), $query);
    }

    private function scrap(IGoogleService $source, string $query): array
    {
        $collection = [];
        $client = new Client();
        $crawler = $client->request('GET', $source->getUrl($query));

        $crawler->filter($source->getWrapperSelector())->each(function ($node) use ($source, &$collection) {
            $result = new Result();

            $result->setTitle($node->filter($source->getTitleSelector())->text());
            $result->setLink(explode('=', $node->filter($source->getLinkSelector())->attr('href'))[1]);
            $result->setText($node->filter($source->getDescSelector())->text());

            $collection[] = $result;
        });

        return $collection;

    }
}