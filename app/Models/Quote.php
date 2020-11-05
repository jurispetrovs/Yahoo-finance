<?php

namespace App\Models;

class Quote
{
    private string $symbol;
    private float $regularMarketPreviousClose;
    private float $regularMarketOpen;
    private float $bid;
    private int $bidSize;
    private float $ask;
    private int $askSize;
    private float $regularMarketDayLow;
    private float $regularMarketDayHigh;
    private float $fiftyTwoWeekLow;
    private float $fiftyTwoWeekHigh;
    private int $regularMarketVolume;
    private int $averageDailyVolume3Month;
    private string $createdAt;

    public function __construct(
        string $symbol,
        float $regularMarketPreviousClose,
        float $regularMarketOpen,
        float $bid,
        int $bidSize,
        float $ask,
        int $askSize,
        float $regularMarketDayLow,
        float $regularMarketDayHigh,
        float $fiftyTwoWeekLow,
        float $fiftyTwoWeekHigh,
        int $regularMarketVolume,
        int $averageDailyVolume3Month,
        string $createdAt
    )
    {
        $this->symbol = $symbol;
        $this->regularMarketPreviousClose = $regularMarketPreviousClose;
        $this->regularMarketOpen = $regularMarketOpen;
        $this->bid = $bid;
        $this->bidSize = $bidSize;
        $this->ask = $ask;
        $this->askSize = $askSize;
        $this->regularMarketDayLow = $regularMarketDayLow;
        $this->regularMarketDayHigh = $regularMarketDayHigh;
        $this->fiftyTwoWeekLow = $fiftyTwoWeekLow;
        $this->fiftyTwoWeekHigh = $fiftyTwoWeekHigh;
        $this->regularMarketVolume = $regularMarketVolume;
        $this->averageDailyVolume3Month = $averageDailyVolume3Month;
        $this->createdAt = $createdAt;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getRegularMarketPreviousClose(): float
    {
        return $this->regularMarketPreviousClose;
    }

    public function getRegularMarketOpen(): float
    {
        return $this->regularMarketOpen;
    }

    public function getBid(): float
    {
        return $this->bid;
    }

    public function getBidSize(): int
    {
        return $this->bidSize;
    }

    public function getAsk(): float
    {
        return $this->ask;
    }

    public function getAskSize(): int
    {
        return $this->askSize;
    }

    public function getRegularMarketDayLow(): float
    {
        return $this->regularMarketDayLow;
    }

    public function getRegularMarketDayHigh(): float
    {
        return $this->regularMarketDayHigh;
    }

    public function getFiftyTwoWeekLow(): float
    {
        return $this->fiftyTwoWeekLow;
    }

    public function getFiftyTwoWeekHigh(): float
    {
        return $this->fiftyTwoWeekHigh;
    }

    public function getRegularMarketVolume(): int
    {
        return $this->regularMarketVolume;
    }

    public function getAverageDailyVolume3Month(): int
    {
        return $this->averageDailyVolume3Month;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['symbol'],
            $data['regular_market_previous_close'],
            $data['regular_market_open'],
            $data['bid'],
            $data['bid_size'],
            $data['ask'],
            $data['ask_size'],
            $data['regular_market_day_low'],
            $data['regular_market_day_high'],
            $data['fifty_two_week_low'],
            $data['fifty_two_week_high'],
            $data['regular_market_volume'],
            $data['average_daily_volume_3_month'],
            $data['created_at']
        );
    }
}