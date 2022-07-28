<?php

namespace App\Interface\Presenter;

use AMA\Domain\Entity\Result;
use AMA\Domain\Presenter\ISearchPresenter;
use AMA\Domain\Response\SearchResponse;
use App\Interface\ViewModel\SearchViewModel;

class SearchPresenter implements ISearchPresenter
{
    /**
     * @var SearchViewModel
     */
    private SearchViewModel $searchViewModel;

    public function present(SearchResponse $response)
    {
        $this->searchViewModel = new SearchViewModel(
            results: array_map(fn(Result $result) => $result, $response->getResults())
        );
    }

    /**
     * @return SearchViewModel
     */
    public function getSearchViewModel(): SearchViewModel
    {
        return $this->searchViewModel;
    }
}