<?php

namespace App\Interface\Controller;

use AMA\Domain\Request\SearchRequest;
use AMA\Domain\UseCase\SearchUseCase;
use App\Interface\Presenter\SearchPresenter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class SearchController
{
    public function __invoke(SearchUseCase $search, SerializerInterface $serializer, Request $request): JsonResponse
    {
        $request = new SearchRequest(query: $request->get('q'));

        $presenter = new SearchPresenter();

        $search->execute($request, $presenter);

        return new JsonResponse(
            data: $serializer->serialize($presenter->getSearchViewModel(), 'json'),
            json: true
        );
    }
}