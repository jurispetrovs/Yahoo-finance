<?php

namespace App\Repositories;

use App\Models\Quote;
use Carbon\Carbon;

class QuoteRepository
{
    public function getBySymbol(string $symbol): ?Quote
    {
        $data = query()->select('*')
            ->from('quotes')
            ->where('symbol = :symbol')
            ->setParameter('symbol', $symbol)
            ->execute()
            ->fetchAssociative();

        if ($data) {
            return Quote::create($data);
        } else {
            return null;
        }
    }

    public function insert(Quote $quote): void
    {
        query()->insert('quotes')
            ->values([
                'symbol' => ':symbol',
                'regular_market_previous_close' => ':regularMarketPreviousClose',
                'regular_market_open' => ':regularMarketOpen',
                'bid' => ':bid',
                'bid_size' => ':bidSize',
                'ask' => ':ask',
                'ask_size' => ':askSize',
                'regular_market_day_low' => ':regularMarketDayLow',
                'regular_market_day_high' => ':regularMarketDayHigh',
                'fifty_two_week_low' => ':fiftyTwoWeekLow',
                'fifty_two_week_high' => ':fiftyTwoWeekHigh',
                'regular_market_volume' => ':regularMarketVolume',
                'average_daily_volume_3_month' => ':averageDailyVolume3Month',
                'created_at' => ':createdAt'
            ])
            ->setParameters([
                'symbol' => $quote->getSymbol(),
                'regularMarketPreviousClose' => $quote->getRegularMarketPreviousClose(),
                'regularMarketOpen' => $quote->getRegularMarketOpen(),
                'bid' => $quote->getBid(),
                'bidSize' => $quote->getBidSize(),
                'ask' => $quote->getAsk(),
                'askSize' => $quote->getAskSize(),
                'regularMarketDayLow' => $quote->getRegularMarketDayLow(),
                'regularMarketDayHigh' => $quote->getRegularMarketDayHigh(),
                'fiftyTwoWeekLow' => $quote->getFiftyTwoWeekLow(),
                'fiftyTwoWeekHigh' => $quote->getFiftyTwoWeekHigh(),
                'regularMarketVolume' => $quote->getRegularMarketVolume(),
                'averageDailyVolume3Month' => $quote->getAverageDailyVolume3Month(),
                'createdAt' => $quote->getCreatedAt()
            ])
            ->execute();
    }

    public function update(Quote $quote): void
    {
        query()
            ->update('quotes')
            ->set('symbol', ':symbol')
            ->set('regular_market_previous_close', ':regularMarketPreviousClose')
            ->set('regular_market_open', ':regularMarketOpen')
            ->set('bid', ':bid')
            ->set('bid_size', ':bidSize')
            ->set('ask', ':ask')
            ->set('ask_size', ':askSize')
            ->set('regular_market_day_low', ':regularMarketDayLow')
            ->set('regular_market_day_high', ':regularMarketDayHigh')
            ->set('fifty_two_week_low', ':fiftyTwoWeekLow')
            ->set('fifty_two_week_high', ':fiftyTwoWeekHigh')
            ->set('regular_market_volume', ':regularMarketVolume')
            ->set('average_daily_volume_3_month', ':averageDailyVolume3Month')
            ->set('created_at', ':createdAt')
            ->setParameters([
                'symbol' => $quote->getSymbol(),
                'regularMarketPreviousClose' => $quote->getRegularMarketPreviousClose(),
                'regularMarketOpen' => $quote->getRegularMarketOpen(),
                'bid' => $quote->getBid(),
                'bidSize' => $quote->getBidSize(),
                'ask' => $quote->getAsk(),
                'askSize' => $quote->getAskSize(),
                'regularMarketDayLow' => $quote->getRegularMarketDayLow(),
                'regularMarketDayHigh' => $quote->getRegularMarketDayHigh(),
                'fiftyTwoWeekLow' => $quote->getFiftyTwoWeekLow(),
                'fiftyTwoWeekHigh' => $quote->getFiftyTwoWeekHigh(),
                'regularMarketVolume' => $quote->getRegularMarketVolume(),
                'averageDailyVolume3Month' => $quote->getAverageDailyVolume3Month(),
                'createdAt' => Carbon::now()->toDateTimeString()
            ])
            ->where('symbol = :symbol')
            ->setParameter('symbol', $quote->getSymbol())
            ->execute();
    }
}