<?php

namespace App\Services\QuoteServices;

use App\Repositories\YahooRepository;

class FindQuoteService
{
    private YahooRepository $yahooRepository;

    public function __construct()
    {
        $this->yahooRepository = new YahooRepository();
    }

    public function execute(string $symbol)
    {
        return $this->yahooRepository->getBySymbol($symbol);
    }
}