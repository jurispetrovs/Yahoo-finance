<?php

namespace App\Repositories;

use App\Models\Quote;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Scheb\YahooFinanceApi\ApiClientFactory;

class YahooRepository
{
    public function getBySymbol(string $symbol): ?Quote
    {
        $client = ApiClientFactory::createApiClient(new Client());
        $quote = $client->getQuote($symbol);

        if(isset($quote)) {
            return new Quote(
                $quote->getSymbol(),
                $quote->getRegularMarketPreviousClose(),
                $quote->getRegularMarketOpen(),
                $quote->getBid(),
                $quote->getBidSize(),
                $quote->getAsk(),
                $quote->getAskSize(),
                $quote->getRegularMarketDayLow(),
                $quote->getRegularMarketDayHigh(),
                $quote->getFiftyTwoWeekLow(),
                $quote->getFiftyTwoWeekHigh(),
                $quote->getRegularMarketVolume(),
                $quote->getAverageDailyVolume3Month(),
                Carbon::now()->toDateTimeString()
            );
        }
        return null;
    }
}