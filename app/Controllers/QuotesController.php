<?php

namespace App\Controllers;

use App\Services\QuoteService;

class QuotesController
{
    public function index()
    {
        return require_once __DIR__ . '/../Views/IndexView.php';
    }

    public function show()
    {
        $symbol = (string)$_POST['symbol'];
        $quote = (new QuoteService())->execute($symbol);

        return require_once __DIR__ . '/../Views/QuoteInformationView.php';
    }
}