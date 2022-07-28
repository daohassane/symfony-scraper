<?php

namespace AMA\Domain\UseCase;

use AMA\Domain\Gateway\SearchGateway;
use AMA\Domain\Presenter\ISearchPresenter;
use AMA\Domain\Request\SearchRequest;
use AMA\Domain\Response\SearchResponse;

class SearchUseCase
{
    private SearchGateway $searchGateway;

    /**
     * @param SearchGateway $searchGateway
     */
    public function __construct(SearchGateway $searchGateway)
    {
        $this->searchGateway = $searchGateway;
    }

    public function execute(SearchRequest $request, ISearchPresenter $presenter): void
    {
        $presenter->present(
            new SearchResponse(
                $this->searchGateway->getSearchResults($request->getQuery())
            )
        );
    }
}