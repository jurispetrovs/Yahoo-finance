<?php

namespace App\Services\QuoteServices;

use App\Models\Quote;
use App\Repositories\QuoteRepository;

class GetQuoteDataService
{
    private QuoteRepository $quoteRepository;

    public function __construct()
    {
        $this->quoteRepository = new QuoteRepository();
    }

    public function execute(string $symbol): ?Quote
    {
        return $this->quoteRepository->getBySymbol($symbol);
    }
}