<?php

namespace App\Services\QuoteServices;

use App\Models\Quote;
use App\Repositories\QuoteRepository;

class InsertQuoteService
{
    private QuoteRepository $quoteRepository;

    public function __construct()
    {
        $this->quoteRepository = new QuoteRepository();
    }

    public function execute(Quote $quote)
    {
        $this->quoteRepository->insert($quote);
    }
}