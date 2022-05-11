$.ajaxSetup({
    method: "GET",
    withCredentials: true,
    headers : {
        'x-api-key' : 'ZBhee8uPaQv5gjjX2zXF8Z1gW7UbjM8P4r9yxnQQlPnTqE5ZFl2fAAbx5cKp5G8l',
        'X-CMC_PRO_API_KEY' : 'ea4f2a8a-bec1-41e2-b4b0-9295654f0b0e',
        'Content-Type': 'application/json'
    }
});

// CoinMarketCap
var url1 = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=VIS,PGX,USDT,USDC,MATIC';
// Crypto Balance Moralis
var url2 = 'https://deep-index.moralis.io/api/v2/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A/erc20?chain=polygon';
var url3 = 'https://deep-index.moralis.io/api/v2/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A/balance?chain=polygon';
// Assets Count 
var url4 = 'https://api-apollo.pegaxy.io/v1/assets/count/user/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A';
// User Pegas
var url5 = 'https://api-apollo.pegaxy.io/v1/pegas/owner/user/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A';
// Earnings History
var url6 = 'https://api-apollo.pegaxy.io/v1/earnings/historical/user/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A';

$.when(
    $.getJSON(url1),
    $.getJSON(url2),
    $.getJSON(url3),
    $.getJSON(url4),
    $.getJSON(url5),
    $.getJSON(url6)
).done(function (data1, data2, data3, data4, data5, data6){

    var matic = data1[0].data.MATIC.quote.USD.price;
    var usdt  = data1[0].data.USDT.quote.USD.price;
    var usdc  = data1[0].data.USDC.quote.USD.price;
    var vis   = data1[0].data.VIS.quote.USD.price;
    var pgx   = data1[0].data.PGX.quote.USD.price;

    for(i=0; i<data2[0].length; i++){
        if(data2[0][i].symbol=='VIS'){
            var value = data2[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 18);
            var balance = Math.round(convert*100)/100;
            document.getElementById('vis').innerHTML = balance;
            document.getElementById('vis_price').innerHTML = '$'+Math.round((balance*vis)*100)/100;
        }else if(data2[0][i].symbol=='PGX'){
            var value = data2[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 18);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('pgx').innerHTML = balance;  
            document.getElementById('pgx_price').innerHTML = '$'+Math.round((balance*pgx)*100)/100;  
        }else if(data2[0][i].symbol=='USDT'){
            var value = data2[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 6);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('usdt').innerHTML = balance;  
            document.getElementById('usdt_price').innerHTML = '$'+Math.round((balance*usdt)*100)/100;  
        }else if(data2[0][i].symbol=='USDC'){
            var value = data2[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 6);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('usdc').innerHTML = balance;  
            document.getElementById('usdc_price').innerHTML = '$'+Math.round((balance*usdc)*100)/100;  
        }else if(data2[0][i].symbol=='PFT'){
            var value = data2[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 0);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('fabledtoken').innerHTML = balance;  
        }          
    }

    var value = data3[0].balance;
    var convert = Moralis.Units.FromWei(value, 18);
    var balance = Math.round(convert*10000)/10000;
    document.getElementById('matic').innerHTML = balance;
    document.getElementById('matic_price').innerHTML = '$'+Math.round((balance*matic)*100)/100;

    var lockedvis = data4[0].lockedVis;
    var pega = data4[0].pega;
    document.getElementById('lockedvis').innerHTML = lockedvis;
    document.getElementById('visoff_price').innerHTML = '$'+Math.round((lockedvis*vis)*100)/100;
    document.getElementById('pega').innerHTML = pega;

    var total_pega = data5[0].length, resting_pega = 0, racing_pega = 0, rented_pega = 0, market_pega = 0;

    for(i=0; i<data5[0].length; i++){
        if(data5[0][i].service == 'NO_SERVICE'){
            resting_pega++;
        }else if(data5[0][i].service == 'RACE_SERVICE'){
            racing_pega++;
        }else if(data5[0][i].service == 'RENT_SERVICE'){
            rented_pega++;
        }else if(data5[0][i].service == 'MARKET_SERVICE'){
            market_pega++;
        }
    }

    document.getElementById('totalpega').innerHTML = total_pega;
    document.getElementById('restingpega').innerHTML = resting_pega;
    document.getElementById('racingpega').innerHTML = racing_pega;
    document.getElementById('rentedpega').innerHTML = rented_pega;
    document.getElementById('shareprofit').innerHTML = rented_pega;
    document.getElementById('marketpega').innerHTML = market_pega;


});