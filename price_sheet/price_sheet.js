$(document).ready(function () {
    console.log(api_base + 'api/price_sheet/2021-10-01');
    fetch( api_base + 'api/price_sheet/2021-10-01').then(function (response) {
        return response.json();
    }).then(function (data) {
        return display(data);
    });
});

function display(data) {
    let dates = data.dates;
    let priceSheet = data.priceSheet;
    let date = data.date;
    let vfexPriceSheet = data.vfexPriceSheet;
    let etfPriceSheet = data.etfPriceSheet;

    let gainers = data.gainers;
    let shakers = data.shakers;
    let topTrades = data.topTrades;
    let indices = data.indices;
    
    let tradeVolume = data.tradeVolume;
    let tradeValue = data.tradeValue;
    let marketCapSum = data.marketCapSum;
    let weightSum = data.weightSum;
    let etfTradeVolume = data.etfTradeVolume;
    let etfTradeValue = data.etfTradeValue;
    let vfexTradeVolume = data.vfexTradeVolume;
    let vfexTradeValue = data.vfexTradeValue;

    displayDate(date);
    displayPriceSheet(priceSheet);

    displayMarketSummary(
        gainers,
        shakers,
        topTrades,
        indices,
    )

    
    
    displayETFPriceSheet(etfPriceSheet);
    displayVFEXPriceSheet(vfexPriceSheet);
}


function displayETFPriceSheet(vfexPriceSheet){
    let dataset = [];

    vfexPriceSheet.forEach(function (entry) {
        console.log("ETF ID: ", entry.etf.id);
        // `<a title="${ entry.company.name }" href="/company/${spacesToDashes(entry.company.name)}/${entry.company.id}"> ${entry.company.symbol.toUpperCase()} </a>`
        const company = `<a title="${ entry.etf.name }" href="/etf/${spacesToDashes(entry.etf.name)}/${entry.etf.id}"> ${entry.etf.symbol.toUpperCase()} </a>`;
        const openingPrice = formatter.format(parseFloat(entry.open) * 100);
        const closingPrice = formatter.format(parseFloat(entry.close) * 100);
        const ltp = formatter.format(parseFloat(entry.close) * 100);
        let percentage_change = parseFloat(entry.percentage_change).toFixed(2);
        
        if(percentage_change < 0){
            percentage_change = `<span class="text-danger"> ${percentage_change} </span>`
        }
        
        if(percentage_change > 0){
            percentage_change = `<span class="text-success"> ${percentage_change} </span>`
        }
        
        
        const volume = new Intl.NumberFormat().format(parseFloat(entry.volume));
        const value = formatter.format(parseFloat(entry.value) * 100);
        const trades = formatter.format(parseFloat(entry.trades) * 100);
        // const market_cap = new Intl.NumberFormat().format(entry.market_cap);
        // const weight = entry.weight.toFixed(2);

        let newRow = [
            company,
            openingPrice,
            closingPrice,
            ltp,
            percentage_change,
            volume,
            value,
        ]
        dataset.push(newRow);
      }
    );

    $('#etf').DataTable({
        data: dataset,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "SYMBOL"},
            { title: "OPEN"},
            { title: "CLOSE"},
            { title: "LTP"},
            { title: "&#916; &#37;"},
            { title: "VOLUME"},
            { title: "VALUE"},
        ]
    });

}


function displayVFEXPriceSheet(vfexPriceSheet){
    let dataset = [];

    vfexPriceSheet.forEach(function (entry) {
           
            const company = `<a title="${ entry.v_f_e_x.name }" href="/vfex/${spacesToDashes(entry.v_f_e_x.name)}/${entry.v_f_e_x.id}"> ${entry.v_f_e_x.symbol.toUpperCase()} </a>`;

            // const company = `<a title="${ entry.v_f_e_x.name }" href="#"> ${entry.v_f_e_x.symbol.toUpperCase()} </a>`;
            const sector = entry.v_f_e_x.sector;
            const openingPrice = formatter.format(parseFloat(entry.open) * 100);
            const closingPrice = formatter.format(parseFloat(entry.close) * 100);
            const ltp = formatter.format(parseFloat(entry.close) * 100);
            const percentage_change = parseFloat(entry.percentage_change).toFixed(2);
            const volume = new Intl.NumberFormat().format(parseFloat(entry.volume));
            const value = formatter.format(parseFloat(entry.value) * 100);
            // const balance_sheet = new Intl.NumberFormat().format(entry.company.balance_sheet.balance_sheet);
            // const market_cap = new Intl.NumberFormat().format(entry.market_cap);
            // const weight = entry.weight.toFixed(2);

            let newRow = [
                company,
                sector,
                openingPrice,
                closingPrice,
                ltp,
                percentage_change,
                volume,
                value,
            ]
            dataset.push(newRow);
        }
    );

    $('#vfex').DataTable({
        data: dataset,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "SYMBOL"},
            { title: "SECTOR"},
            { title: "OPEN"},
            { title: "CLOSE"},
            { title: "LTP"},
            { title: "&#916; &#37;"},
            { title: "VOLUME"},
            { title: "VALUE"},
        ]
    });
}

function  displayMarketSummary(
    gainers,
    shakers,
    topTrades,
    indices,
) {
    let gainersArray = [];
    let shakersArray = [];
    let topTradesArray = [];

    let indicesArray = [
        [
            "ZSE ALL SHARE",
            new Intl.NumberFormat().format(indices.all_share_open),
            new Intl.NumberFormat().format(indices.all_share_close),
            parseFloat(indices.all_share_change).toFixed(2)
        ],
        ["ZSE TOP 10", indices.top_ten_open, indices.top_ten_close, parseFloat(indices.top_ten_change).toFixed(2)],
        ["ZSE TOP 15", indices.top_15_open, indices.top_15_close, parseFloat(indices.top_15_change).toFixed(2)],
        ["MEDIUM CAP", indices.medium_cap_open, indices.medium_cap_close, parseFloat(indices.medium_cap_change).toFixed(2)],
        ["SMALL CAP", indices.small_cap_open, indices.small_cap_close, parseFloat(indices.small_cap_change).toFixed(2)]
    
    ];


    gainers.forEach(function (entry) {
        const company = `<a title="${ entry.company.name }" href="/company/${spacesToDashes(entry.company.name)}/${entry.company.id}"> ${entry.company.symbol.toUpperCase()} </a>`;
        const percentage_change = parseFloat(entry.percentage_change).toFixed(2);
        let newRow = [ company, percentage_change ]
        gainersArray.push(newRow);
    });


    shakers.forEach(function (entry) {
        const company = `<a title="${ entry.company.name }" href="/company/${spacesToDashes(entry.company.name)}/${entry.company.id}"> ${entry.company.symbol.toUpperCase()} </a>`;
        const percentage_change = parseFloat(entry.percentage_change).toFixed(2);
        let newRow = [ company, percentage_change ]
        shakersArray.push(newRow);
    });

    topTrades.forEach(function (entry) {
        const company = `<a title="${ entry.company.name }" href="/company/${spacesToDashes(entry.company.name)}/${entry.company.id}"> ${entry.company.symbol.toUpperCase()} </a>`;
        const value = formatter.format(entry.value * 100);
        let newRow = [ company, value ]
        topTradesArray.push(newRow);
    });


    let masterArray = [
        indicesArray[0].concat(gainersArray[0], shakersArray[0], topTradesArray[0]),
        indicesArray[1].concat(gainersArray[1], shakersArray[1], topTradesArray[1]),
        indicesArray[2].concat(gainersArray[2], shakersArray[2], topTradesArray[2]),
        indicesArray[3].concat(gainersArray[3], shakersArray[3], topTradesArray[3]),
        indicesArray[4].concat(gainersArray[4], shakersArray[4], topTradesArray[4])
    ]


    $('#summaries').DataTable({
        data: masterArray,
        "paging": false,
        "searching": false,
        "info": false,
        "ordering": false,
        columns: [
            { title: "INDICES"},
            { title: "OPEN"},
            { title: "CLOSE"},
            { title: "CHANGE"},
            { title: "GAINERS"},
            { title: "CHANGE"},
            { title: "SHAKERS"},
            { title: "CHANGE"},
            { title: "TOP TRADERS"},
            { title: "VALUE"},
        ]
    });

    $('#gainers').DataTable({
        data: gainersArray,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "GAINERS"},
            { title: "%"}
        ]
    });

    $('#shakers').DataTable({
        data: shakersArray,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "SHAKERS"},
            { title: "%"}
        ]
    });

    $('#topTrades').DataTable({
        data: topTradesArray,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "TOP TRADES"},
            { title: "VALUE (ZWL $)"}
        ]
    });

    $('#indices').DataTable({
        data: indicesArray,
        "paging": false,
        "searching": false,
        "info": false,
        columns: [
            { title: "INDICES"},
            { title: "OPEN"},
            { title: "CLOSE"},
            { title: "% CHANGE"}
        ]
    });


}

function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase().replace(/[\])}[{(]/g, '');
}


function displayPriceSheet(priceSheet) {
    let dataset = [];
    priceSheet.forEach(function (entry) {
        const company = `<a title="${ entry.company.name }" href="/company/${spacesToDashes(entry.company.name)}/${entry.company.id}"> ${entry.company.symbol.toUpperCase()} </a>`;
        let sector = entry.company.sector;
        // let openingPrice = formatter.format(parseFloat(entry.open) * 100); 
        let openingPrice = new Intl.NumberFormat().format(parseFloat(entry.open * 100));
        // let closingPrice = formatter.format(parseFloat(entry.close) * 100);
        let closingPrice = new Intl.NumberFormat().format(parseFloat(entry.close * 100));
        // let ltp = formatter.format(parseFloat(entry.close) * 100);
        let ltp = new Intl.NumberFormat().format(parseFloat(entry.close * 100));
        let percentage_change = parseFloat(entry.percentage_change).toFixed(2);
        let volume = new Intl.NumberFormat().format(parseInt(entry.volume)) == 0 ? '-' : new Intl.NumberFormat().format(parseInt(entry.volume));
        let value = new Intl.NumberFormat().format(parseFloat(entry.value  * 100)) == "0.00" ? '-' : new Intl.NumberFormat().format(parseFloat(entry.value  * 100));
        let balance_sheet = new Intl.NumberFormat().format(parseFloat(entry.company.balance_sheet.balance_sheet));
        let market_cap = new Intl.NumberFormat().format(parseFloat(entry.market_cap  * 100));
        let weight = parseFloat(entry.weight).toFixed(2) == 0.00 ? '-' : parseFloat(entry.weight).toFixed(2);

        

        let newRow = [
            company,
            sector,
            openingPrice,
            closingPrice,
            ltp,
            percentage_change,
            volume,
            value,
            balance_sheet,
            market_cap,
            weight
        ]
        dataset.push(newRow);
    });

    $('#price-sheet').DataTable({
        data: dataset,
        "info": false,
        "pageLength": 25,
        columns: [
            { title: "SYMBOL"},
            { title: "SECTOR"},
            { title: "OPEN"},
            { title: "CLOSE"},
            { title: "LTP"},
            { title: "&#916; &#37;"},
            { title: "VOLUME"},
            { title: "VALUE"},
            { title: "BAL. SHEET"},
            { title: "MARKET CAP. (mil)"},
            { title: "WEIGHT"}
        ]
    });
}

function displayDate(date) {
    var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
    date = new Date(date).toLocaleDateString("en-UK", options);
    $(".date").text(date);
}



const formatter = new Intl.NumberFormat();

function movers_pc(data, type, full, meta) {
    var pc = data.dlpChangePC;
    if (pc > 0) {
        return '<span class="green">&#9650;</span>';
    } else if(pc < 0) {
        return '<span class="red">&#9660;</span>';
    } else {
        return '<span class="gray">&#9632;</span>';
    }
}