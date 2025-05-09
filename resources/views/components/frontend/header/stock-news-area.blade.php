<div class="col-12 col-md-6">
    <div class="stock-news-area">
        <div id="stockNewsTicker" class="ticker">
            <ul>
                <li>
                    <div class="single-stock-report">
                        <div class="stock-values">
                            <span>EUR/USD</span>
                            <span>{{ $stockData['eur_usd']['price'] ?? 'N/A' }}</span>
                        </div>
                        <div class="stock-index {{ isset($stockData['eur_usd']['change']) && is_numeric($stockData['eur_usd']['change']) && $stockData['eur_usd']['change'] >= 0 ? 'plus-index' : 'minus-index' }}">
                            <h4>{{ $stockData['eur_usd']['change_percent'] ?? 'N/A' }}</h4>
                        </div>
                    </div>
                    <div class="single-stock-report">
                        <div class="stock-values">
                            <span>BTC/USD</span>
                            <span>{{ $stockData['btc_usd']['price'] ?? 'N/A' }}</span>
                        </div>
                        <div class="stock-index {{ isset($stockData['btc_usd']['change']) && is_numeric($stockData['btc_usd']['change']) && $stockData['btc_usd']['change'] >= 0 ? 'plus-index' : 'minus-index' }}">
                            <h4>{{ $stockData['btc_usd']['change_percent'] ?? 'N/A' }}</h4>
                        </div>
                    </div>
                    <div class="single-stock-report">
                        <div class="stock-values">
                            <span>ETH/USD</span>
                            <span>{{ $stockData['eth_usd']['price'] ?? 'N/A' }}</span>
                        </div>
                        <div class="stock-index {{ isset($stockData['eth_usd']['change']) && is_numeric($stockData['eth_usd']['change']) && $stockData['eth_usd']['change'] >= 0 ? 'plus-index' : 'minus-index' }}">
                            <h4>{{ $stockData['eth_usd']['change_percent'] ?? 'N/A' }}</h4>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
