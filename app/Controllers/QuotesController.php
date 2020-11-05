<?php

namespace App\Controllers;

use App\Services\QuoteServices\FindQuoteService;
use App\Services\QuoteServices\InsertQuoteService;
use App\Services\QuoteServices\GetQuoteDataService;
use App\Services\QuoteServices\UpdateQuoteService;
use Carbon\Carbon;

class QuotesController
{
    public function index()
    {
        return require_once __DIR__ . '/../Views/IndexView.php';
    }

    public function show()
    {
        $symbol = (string)$_POST['symbol'];

        $quote = (new GetQuoteDataService())->execute($symbol);

        if (isset($quote)) {
            if (Carbon::now()->diffInMinutes($quote->getCreatedAt()) > 10) {
                $yahooQuote = (new FindQuoteService())->execute($symbol);
                (new UpdateQuoteService())->execute($yahooQuote);
                $quote = (new GetQuoteDataService())->execute($symbol);
            }
        } else {
            $yahooQuote = (new FindQuoteService())->execute($symbol);
            if (isset($yahooQuote)) {
                (new InsertQuoteService())->execute($yahooQuote);
                $quote = (new GetQuoteDataService())->execute($symbol);
            }
        }

        return require_once __DIR__ . '/../Views/QuoteInformationView.php';
    }
}