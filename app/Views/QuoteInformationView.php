<?php use App\NumberFormatter; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Information</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <a href="/">Back</a>
    <h1 style="text-align: center">Search result by: <?php echo $symbol; ?></h1>
    <div class="parent">
        <div class="left-sidebar"></div>
        <div class="body">
            <?php if(isset($quote)): ?>
            <table class="quote-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Previous Close</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getRegularMarketPreviousClose()); ?></td>
                    </tr>
                    <tr>
                        <td>Open</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getRegularMarketOpen()); ?></td>
                    </tr>
                    <tr>
                        <td>Bid</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getBid()); ?> x
                            <?php echo NumberFormatter::bidSizeFormatter($quote->getBidSize()); ?></td>
                    </tr>
                    <tr>
                        <td>Ask</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getAsk()); ?> x
                            <?php echo NumberFormatter::askSizeFormatter($quote->getAskSize()); ?></td>
                    </tr>
                    <tr>
                        <td>Day's Range</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getRegularMarketDayLow()); ?> -
                            <?php echo NumberFormatter::floatValueFormatter($quote->getRegularMarketDayHigh()); ?></td>
                    </tr>
                    <tr>
                        <td>52 Week Range</td>
                        <td><?php echo NumberFormatter::floatValueFormatter($quote->getFiftyTwoWeekLow()); ?> -
                            <?php echo NumberFormatter::floatValueFormatter($quote->getFiftyTwoWeekHigh()); ?></td>
                    </tr>
                    <tr>
                        <td>Volume</td>
                        <td><?php echo NumberFormatter::volumeFormatter($quote->getRegularMarketVolume()); ?></td>
                    </tr>
                    <tr>
                        <td>Avg. Volume</td>
                        <td><?php echo NumberFormatter::volumeFormatter($quote->getAverageDailyVolume3Month()); ?></td>
                    </tr>
                </tbody>
            </table>
                <p style="text-align: center"><small>Updated: <?php echo $quote->getCreatedAt(); ?></small></p>
            <?php else: ?>
                <h2 style="text-align: center">Nothing was found !</h2>
            <?php endif; ?>
        </div>
        <div class="right-sidebar"></div>
    </div>
</body>
</html>