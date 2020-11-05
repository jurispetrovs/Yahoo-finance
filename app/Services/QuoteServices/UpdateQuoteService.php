<?php

namespace App\Services\QuoteServices;

use App\Models\Quote;
use App\Repositories\QuoteRepository;

class UpdateQuoteService
{
    private QuoteRepository $quoteRepository;

    public function __construct()
    {
        $this->quoteRepository = new QuoteRepository();
    }

    public function execute(Quote $quote): void
    {
        $this->quoteRepository->update($quote);
    }
}