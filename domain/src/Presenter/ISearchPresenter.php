<?php

namespace AMA\Domain\Presenter;

use AMA\Domain\Response\SearchResponse;

interface ISearchPresenter
{
    public function present(SearchResponse $response);
}