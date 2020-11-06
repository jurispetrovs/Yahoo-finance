<?php

namespace App\Services;

use App\Models\Quote;
use App\Repositories\QuoteRepository;
use App\Repositories\YahooRepository;
use Carbon\Carbon;

class QuoteService
{
    private QuoteRepository $quoteRepository;
    private YahooRepository $yahooRepository;

    public function __construct()
    {
        $this->quoteRepository = new QuoteRepository();
        $this->yahooRepository = new YahooRepository();
    }

    public function execute(string $symbol): ?Quote
    {
        $quote = $this->quoteRepository->getBySymbol($symbol);

        if (isset($quote)) {
            if (Carbon::now()->diffInMinutes($quote->getCreatedAt()) > 10) {
                $yahooData = $this->yahooRepository->getBySymbol($symbol);
                $this->quoteRepository->update($yahooData);
            }
        } else {
            $yahooData = $this->yahooRepository->getBySymbol($symbol);
            if (isset($yahooData)) {
                $this->quoteRepository->insert($yahooData);
            }
        }

        $quote = $this->quoteRepository->getBySymbol($symbol);

        return $quote;
    }
}