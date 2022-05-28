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
// Currency Pair
var url2 = 'https://api.exchangerate.host/convert?from=USD&to='+code;
// Crypto Balance Moralis
var url3 = 'https://deep-index.moralis.io/api/v2/'+address+'/erc20?chain=polygon';
var url4 = 'https://deep-index.moralis.io/api/v2/'+address+'/balance?chain=polygon';
// Assets Count 
var url5 = 'https://api-apollo.pegaxy.io/v1/assets/count/user/'+address;
// User Pegas
var url6 = 'https://api-apollo.pegaxy.io/v1/pegas/owner/user/'+address;

$.when(
    $.getJSON(url1),
    $.getJSON(url2),
    $.getJSON(url3),
    $.getJSON(url4),
    $.getJSON(url5),
    $.getJSON(url6)
).done(function (data1, data2, data3, data4, data5, data6){

    // Crypto Pair
    var matic = data1[0].data.MATIC.quote.USD.price;
    var usdt  = data1[0].data.USDT.quote.USD.price;
    var usdc  = data1[0].data.USDC.quote.USD.price;
    var vis   = data1[0].data.VIS.quote.USD.price;
    var pgx   = data1[0].data.PGX.quote.USD.price;

    // Currency Pair
    var currency = data2[0].result;

    // Crypto Balance
    for(i=0; i<data3[0].length; i++){
        if(data3[0][i].symbol=='VIS'){
            var value = data3[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 18);
            var balance = Math.round(convert*100)/100;
            document.getElementById('vis').innerHTML = balance;
            document.getElementById('vis_price').innerHTML = Math.round((balance*vis*currency)*100)/100+' '+code;
        }else if(data3[0][i].symbol=='PGX'){
            var value = data3[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 18);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('pgx').innerHTML = balance;  
            document.getElementById('pgx_price').innerHTML = Math.round((balance*pgx*currency)*100)/100+' '+code;  
        }else if(data3[0][i].symbol=='USDT'){
            var value = data3[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 6);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('usdt').innerHTML = balance;  
            document.getElementById('usdt_price').innerHTML = Math.round((balance*usdt*currency)*100)/100+' '+code;  
        }else if(data3[0][i].symbol=='USDC'){
            var value = data3[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 6);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('usdc').innerHTML = balance;  
            document.getElementById('usdc_price').innerHTML = Math.round((balance*usdc*currency)*100)/100+' '+code;  
        }else if(data3[0][i].symbol=='PFT'){
            var value = data3[0][i].balance;
            var convert = Moralis.Units.FromWei(value, 0);
            var balance = Math.round(convert*10000)/10000;
            document.getElementById('fabledtoken').innerHTML = balance;  
        }          
    }

    var value = data4[0].balance;
    var convert = Moralis.Units.FromWei(value, 18);
    var balance = Math.round(convert*10000)/10000;
    document.getElementById('matic').innerHTML = balance;
    document.getElementById('matic_price').innerHTML = Math.round((balance*matic*currency)*100)/100+' '+code;

    var lockedvis = data5[0].lockedVis;
    var pega = data5[0].pega;
    document.getElementById('lockedvis').innerHTML = lockedvis;
    document.getElementById('visoff_price').innerHTML = Math.round((lockedvis*vis*currency)*100)/100+' '+code;
    document.getElementById('pega').innerHTML = pega;

    
    // Pegas Section
    
    var total_pega = data6[0].length, resting_pega = 0, racing_pega = 0, rented_pega = 0, market_pega = 0;

    for(i=0; i<data6[0].length; i++){
        if(data6[0][i].service == 'NO_SERVICE'){
            resting_pega++;
        }else if(data6[0][i].service == 'RACE_SERVICE'){
            racing_pega++;
        }else if(data6[0][i].service == 'RENT_SERVICE'){
            rented_pega++;
        }else if(data6[0][i].service == 'MARKET_SERVICE'){
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
