$(document).ready(function () {
    main();
});


function main(){
    // const api_base = "http://192.168.100.24:8000/";
    const api_base = "/site/backend/public/";
    
    console.log("Page Url", $(location).attr("href"));
    let theUrl = $(location).attr("href")

    let id = theUrl.split("/")[5];
    
    console.log("The ID: ", id);
    
    let companyDetails = new CompanyDetails(id, api_base);
    companyDetails.fetchAndDisplay();

    let stockChart = new StockChart(id, api_base);
    stockChart.fetchAndDisplay();
    hide();

    let priceSheetSummary = new PriceSheetSummary(id, api_base);
    priceSheetSummary.fetchAndDisplay();

    let topShareholders = new TopShareholders(id, api_base);
    topShareholders.fetchAndDisplay();

    let reports = new Reports(id, api_base);
    reports.fetchAndDisplay();

    let sectorComposition = new SectorComposition(id, api_base);
    sectorComposition.fetchAndDisplay();

    let companiesList = new CompaniesList(api_base);
    companiesList.fetchAndDisplay(); //must be last, for loading spinner
    

    $('g:has(> g[stroke="#3cabff"])').hide();

}


class SectorComposition{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        console.log(this.api_base + 'api/sector_composition/' + this.id);
        fetch(this.api_base + 'api/sector_composition/' + this.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            let sectorComposirionData = [];
            let sectorName = data[0].sector;
            
            data.forEach(function (entry) {
                let id = entry.id;
                let symbol = `<span style="cursor: pointer" onclick="showSnippert(${id})"  >${entry.symbol.toUpperCase()}</span>`;
                let name = `<span style="cursor: pointer" onclick="showSnippert(${id})"  >${entry.name}</span>`;
                
                let newRow = [
                    symbol,
                    name,
                ]
                sectorComposirionData.push(newRow);
             }
            ); // foreach


            $(".sector_name").text(sectorName);

            $('#sector_composition_table').DataTable({
                data: sectorComposirionData,
                "info": false,
                "pageLength": 100,
                ordering: false,
                searching: false,
                paging: false,
                columns: [
                    { title: "SYMBOL"},
                    { title: "NAME"}
                ]
            });


            }
        );
    }
}

class Reports{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        let base = this.api_base;
        fetch(this.api_base + 'api/reports/' + this.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log("Report Card", data)
            data.forEach(function (entry) {
                const title = entry.title;
                const extract = truncateString(entry.section_1, 300);
                const date = entry.date;
                const type = entry.type;
                const path = base + 'storage/' + entry.path;

                const clonedCard = $('#report_card_template').clone();

                
                clonedCard.css('display', 'block');


                $("#report_link").attr("href", 'view_report.php?report=' + entry.id);
                $("#report_link").prop("href", 'view_report.php?report=' + entry.id);
                console.log($("#report_link"))


                clonedCard.find('.title').text(title);
                clonedCard.find('.extract').html(extract);
                // document.getElementsByClassName(extract).innerHTML = el;
                clonedCard.find('.date').text(date);
                clonedCard.find('.type').text(type);
                clonedCard.find('.report_link').prop("href", 'view_report.php?report=' + entry.id);

                clonedCard.appendTo("#reports_row");
                
            });
            
            }, base
        );
            
    }
}

class TopShareholders{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        fetch(this.api_base + 'api/top_shareholders/' + this.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            // console.log(data)
            
            data.forEach(function (entry) {
                const name = entry.name;
                const shares = (parseFloat(entry.shares) * 100).toFixed(2);

                $('#top_shareholders').append(`<tr><td>${name}</td><td>${shares}</td></tr>`);

                
            });
            
            } 
        );
            
    }

}

class PriceSheetSummary{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        console.log("Sheet Summary: ", this.api_base + 'api/etf/price_sheet/summary/' + this.id);
        fetch(this.api_base + 'api/vfex/price_sheet/summary/' + this.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            let change = parseFloat(data.change).toFixed(2);
            let market_cap = parseFloat(data.market_cap);
            let name = data.name;
            let symbol = data.symbol;
            let percentage_change = parseFloat(data.percentage_change).toFixed(2);
            let price = Intl.NumberFormat().format(parseFloat(data.price)) / 100;
            let sector = data.sector;
            let sector_market_cap = parseFloat(data.sector_market_cap);

            let percent = ((market_cap/sector_market_cap) * 100).toFixed(2);

            $('.price').text(price);
            $('.market_cap').text(Intl.NumberFormat().format(data.market_cap));
            $('.change').text(change);
            $('.percentage_change').text(percentage_change);

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("CH299029678");

            var chart = am4core.create("market_shaare_chart", am4charts.PieChart);

            // Set data
            var selected;
            var types = [
                {
                    type: "SECTOR",
                    percent: 100 - percent,
                    color: chart.colors.getIndex(0),
                }, 
                {
                    type: symbol.toUpperCase(),
                    percent: percent,
                    color: chart.colors.getIndex(13),
                }
            ];

            chart.data = generateChartData();

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "percent";
            pieSeries.dataFields.category = "type";
            pieSeries.slices.template.propertyFields.fill = "color";
            pieSeries.slices.template.propertyFields.isActive = "pulled";
            pieSeries.slices.template.strokeWidth = 0;

            function generateChartData() {
            var chartData = [];
            for (var i = 0; i < types.length; i++) {
                if (i == selected) {
                for (var x = 0; x < types[i].subs.length; x++) {
                    chartData.push({
                    type: types[i].subs[x].type,
                    percent: types[i].subs[x].percent,
                    color: types[i].color,
                    pulled: true
                    });
                }
                } else {
                chartData.push({
                    type: types[i].type,
                    percent: types[i].percent,
                    color: types[i].color,
                    id: i
                });
                }
            }
            return chartData;
            }

            pieSeries.slices.template.events.on("hit", function(event) {
            if (event.target.dataItem.dataContext.id != undefined) {
                selected = event.target.dataItem.dataContext.id;
            } else {
                selected = undefined;
            }
            chart.data = generateChartData();
            });
            
            } 
        );
            
    }
}


class PieChart{

}

class CompanyDetails{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        let base = this.api_base;
        console.log(this.api_base + 'api/companies/' + this.id);
        fetch(this.api_base + 'api/companies/' + this.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            // this.display(data);
            // console.log(data);

            let id = data.id;
            let name = data.name;
            let symbol = data.symbol;
            let status = data.status == 1 ? "Active" : "Suspended";
            let sector = data.sector == "" ? "-" : data.sector;
            console.log("The Sector", sector);
            let isin_no = data.isin_no;
            let year_end = data.year_end;
            let founded = data.founded;
            let listed = data.listed;
            let historic_data = data.historic_data;

            let top_counters = data.top_counters;

            

            try {
                let company_logo = base + 'storage/' + data.company_logo.file_path;
                $(".logo_img").attr("src", company_logo);
            }
            catch (err) {
                let company_logo = "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/corporate-company-logo-design-template-2402e0689677112e3b2b6e0f399d7dc3_screen.jpg";
                $(".logo_img").attr("src", company_logo);
            }

            let lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aspernatur commodi cupiditate eius esse expedita maxime minus mollitia reiciendis voluptatibus. Aliquam dolor ex expedita fugiat molestias nisi perferendis sequi sunt.";
            let summary = data.summary == null ? lorem : data.summary;

            $(".summary").html(summary);


            let outstanding_shares = 0;
            let balance_sheet = 0;

            try {
                balance_sheet = new Intl.NumberFormat().format(data.balance_sheet.balance_sheet);
            }
            catch (error){
                balance_sheet = "-";
            }

            try {
                outstanding_shares = new Intl.NumberFormat().format(data.outstanding_shares.outstanding_shares);
            }
            catch (error){
                outstanding_shares = "-";
            }
        
            $('.name').text(name);
            $('.symbol').text(symbol.toUpperCase());
        
            const arrayData = [
                [sector, status, outstanding_shares, balance_sheet]
            ];

            let top_counters_array = [];

            let counte_date = "";
            top_counters.forEach(function (counter) {
                let etf_counter = counter.counter;
                let counter_market_cap =  Intl.NumberFormat().format(parseFloat(counter.market_cap));
                let counter_market_weight = counter.market_weight;
                let top_10_index_weight = counter.top_10_index_weight;
                let etf_weight = counter.etf_weight;
                counte_date = counter.date;

                
                let newRow = [
                    etf_counter,
                    counter_market_cap,
                    counter_market_weight,
                    top_10_index_weight,
                    etf_weight,
                ]
                top_counters_array.push(newRow);
             }
            ); 

            
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            counte_date = new Date(counte_date).toLocaleDateString("en-UK", options);
            $("#counter_date").text(counte_date.toUpperCase());
                
            $('#company_details').DataTable( {
                data: top_counters_array,
                info: false,
                ordering: false,
                paging: false,
                searching: false,

                columns: [
                    { title: "COUNTER" },
                    { title: "MARKET CAP (ZWL)" },
                    { title: "MARKET WEIGHT (ALL SHARE INDEX)" },
                    { title: "TOP 10 INDEX WEIGHT" },
                    { title: "ETF WEIGHT" },
                ]
            } );
            
        }, base );
    }
}

class StockChart{
    constructor(id, api_base){
        this.id = id;
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        am4core.useTheme(am4themes_animated);
        am4core.addLicense("CH299029678");

        // Create chart
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.padding(0, 15, 0, 15);
        // Load data
        chart.dataSource.url = this.api_base + "api/vfex_historic_data/" + this.id;
        console.log("Data Source: ", chart.dataSource.url);
        chart.dataSource.parser = new am4core.CSVParser();
        chart.dataSource.parser.options.useColumnNames = true;
        chart.dataSource.parser.options.reverse = true;

        // the following line makes value axes to be arranged vertically.
        chart.leftAxesContainer.layout = "vertical";

        // uncomment this line if you want to change order of axes
        //chart.bottomAxesContainer.reverseOrder = true;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.ticks.template.length = 8;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.1;
        dateAxis.renderer.grid.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = false;
        dateAxis.renderer.ticks.template.strokeOpacity = 0.2;
        dateAxis.renderer.minLabelPosition = 0.01;
        dateAxis.renderer.maxLabelPosition = 0.99;
        dateAxis.keepSelection = true;
        dateAxis.minHeight = 30;

        dateAxis.groupData = true;
        dateAxis.minZoomCount = 5;

        // these two lines makes the axis to be initially zoomed-in
        // dateAxis.start = 0.7;
        // dateAxis.keepSelection = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.zIndex = 1;
        valueAxis.renderer.baseGrid.disabled = true;
        // height of axis
        valueAxis.height = am4core.percent(65);

        valueAxis.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis.renderer.gridContainer.background.fillOpacity = 0.05;
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.verticalCenter = "bottom";
        valueAxis.renderer.labels.template.padding(2, 2, 2, 2);

        //valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis.renderer.fontSize = "0.8em"

        var series = chart.series.push(new am4charts.CandlestickSeries());
        series.dataFields.dateX = "Date";
        series.dataFields.openValueY = "Open";
        series.dataFields.valueY = "Close";
        series.dataFields.lowValueY = "Low";
        series.dataFields.highValueY = "High";
        series.clustered = false;
        series.tooltipText = "open: {openValueY.value}\nlow: {lowValueY.value}\nhigh: {highValueY.value}\nclose: {valueY.value}";
        series.name = "MSFT";
        series.defaultState.transitionDuration = 0;

        var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis2.tooltip.disabled = true;
        // height of axis
        valueAxis2.height = am4core.percent(35);
        valueAxis2.zIndex = 3
        // this makes gap between panels
        valueAxis2.marginTop = 30;
        valueAxis2.renderer.baseGrid.disabled = true;
        valueAxis2.renderer.inside = true;
        valueAxis2.renderer.labels.template.verticalCenter = "bottom";
        valueAxis2.renderer.labels.template.padding(2, 2, 2, 2);
        //valueAxis.renderer.maxLabelPosition = 0.95;
        valueAxis2.renderer.fontSize = "0.8em"

        valueAxis2.renderer.gridContainer.background.fill = am4core.color("#000000");
        valueAxis2.renderer.gridContainer.background.fillOpacity = 0.05;

        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.dateX = "Date";
        series2.clustered = false;
        series2.dataFields.valueY = "Volume";
        series2.yAxis = valueAxis2;
        series2.tooltipText = "{valueY.value}";
        series2.name = "Series 2";
        // volume should be summed
        series2.groupFields.valueY = "sum";
        series2.defaultState.transitionDuration = 0;

        chart.cursor = new am4charts.XYCursor();

        var scrollbarX = new am4charts.XYChartScrollbar();

        var sbSeries = chart.series.push(new am4charts.LineSeries());
        sbSeries.dataFields.valueY = "Close";
        sbSeries.dataFields.dateX = "Date";
        scrollbarX.series.push(sbSeries);
        sbSeries.disabled = true;
        scrollbarX.marginBottom = 20;
        chart.scrollbarX = scrollbarX;
        scrollbarX.scrollbarChart.xAxes.getIndex(0).minHeight = undefined;



        /**
         * Set up external controls
         */

        // Date format to be used in input fields
        var inputFieldFormat = "yyyy-MM-dd";

        document.getElementById("b1m").addEventListener("click", function() {
        var max = dateAxis.groupMax["day1"];
        var date = new Date(max);
        am4core.time.add(date, "month", -1);
        zoomToDates(date);
        });

        document.getElementById("b3m").addEventListener("click", function() {
        var max = dateAxis.groupMax["day1"];
        var date = new Date(max);
        am4core.time.add(date, "month", -3);
        zoomToDates(date);
        });

        document.getElementById("b6m").addEventListener("click", function() {
        var max = dateAxis.groupMax["day1"];
        var date = new Date(max);
        am4core.time.add(date, "month", -6);
        zoomToDates(date);
        });

        document.getElementById("b1y").addEventListener("click", function() {
        var max = dateAxis.groupMax["day1"];
        var date = new Date(max);
        am4core.time.add(date, "year", -1);
        zoomToDates(date);
        });

        document.getElementById("bytd").addEventListener("click", function() {
        var max = dateAxis.groupMax["day1"];
        var date = new Date(max);
        am4core.time.round(date, "year", 1);
        zoomToDates(date);
        });

        document.getElementById("bmax").addEventListener("click", function() {
        var min = dateAxis.groupMin["day1"];
        var date = new Date(min);
        zoomToDates(date);
        });

        dateAxis.events.on("selectionextremeschanged", function() {
        updateFields();
        });

        dateAxis.events.on("extremeschanged", updateFields);

        function updateFields() {
        var minZoomed = dateAxis.minZoomed + am4core.time.getDuration(dateAxis.mainBaseInterval.timeUnit, dateAxis.mainBaseInterval.count) * 0.5;
        document.getElementById("fromfield").value = chart.dateFormatter.format(minZoomed, inputFieldFormat);
        document.getElementById("tofield").value = chart.dateFormatter.format(new Date(dateAxis.maxZoomed), inputFieldFormat);
        }

        document.getElementById("fromfield").addEventListener("keyup", updateZoom);
        document.getElementById("tofield").addEventListener("keyup", updateZoom);

        var zoomTimeout;
        function updateZoom() {
        if (zoomTimeout) {
            clearTimeout(zoomTimeout);
        }
        zoomTimeout = setTimeout(function() {
            var start = document.getElementById("fromfield").value;
            var end = document.getElementById("tofield").value;
            if ((start.length < inputFieldFormat.length) || (end.length < inputFieldFormat.length)) {
            return;
            }
            var startDate = chart.dateFormatter.parse(start, inputFieldFormat);
            var endDate = chart.dateFormatter.parse(end, inputFieldFormat);

            if (startDate && endDate) {
            dateAxis.zoomToDates(startDate, endDate);
            }
        }, 500);
        }

        function zoomToDates(date) {
        var min = dateAxis.groupMin["day1"];
        var max = dateAxis.groupMax["day1"];
        dateAxis.keepSelection = true;
        //dateAxis.start = (date.getTime() - min)/(max - min);
        //dateAxis.end = 1;

        dateAxis.zoom({start:(date.getTime() - min)/(max - min), end:1});
        }
    }
}

class CompaniesList{
    constructor(api_base){
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        fetch(this.api_base + 'api/list').then(function (response) {
            return response.json();
        }).then(function (data) {
            let companies = [];
            data.forEach(function (entry) {
                const id = entry.id;
                const name = `<a title="View Company" href="/company/${spacesToDashes(entry.name)}/${id}}"> ${entry.name} </a>`;
                const symbol = `<a title="${entry.name}" href="/company/${spacesToDashes(entry.name)}/${id}"> ${entry.symbol.toUpperCase()} </a>`;
                // const symbol = `<a title="${entry.name}" href="/site/company/${spacesToDashes(entry.name)}/${id}"> ${entry.symbol.toUpperCase()} </a>`;
                const company = [
                    symbol,
                    name
                ]
                companies.push(company);
            });
        
            $('#companies').DataTable( {
                data: companies,
                "info": false,
                "pageLength": 10,
                lengthChange: false,
                processing: true,
                deferRender: true,
                columns: [
                    { title: "SYMBOL" },
                    { title: "NAME" },
                ]
            } );
            hide();
        });
    }
}

function getID(name) {
    // console.log("The name", name);
    console.log( "The name", location.search.split("/")[2]);

    return (location.search.split(name + '=')[1] || '').split('&')[0];
}

// (A) SHOW & HIDE SPINNER
function show () {
    document.getElementById("spinner").classList.add("show");
  }

function hide () {
    // document.getElementById("spinner").classList.remove("show");
    // document.getElementById("spinner").style.opacity = 0 ;
    // document.getElementById("spinner").style.display = 'none' ;
}

function truncateString(string, limit) {
    if (string.length > limit) {
      return string.substring(0, limit) + "..."
    } else {
      return string
    }
  }

  function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase();
}


function showSnippert(theId){
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    // ____________________________ FETCH THE COMPANY DETAILS AND DISPLAY ____________
    
    let base = api_base;
    
    fetch(api_base + 'api/company_snippet/' + theId).then(function (response) {
        return response.json();
    }).then(function (data) {
        let name = data.name;
        $('.sector_company_name').text(name);

        let symbol = data.symbol;
        $('.sector_company_symbol').text(symbol);

        // let link = `company_details.php?company=${data.id}`;
        let link = `/company/${spacesToDashes(name)}/${data.id}`;
        $('.sector_company_link').attr("href", link);

        let status = data.status == 1 ? "Active" : "Suspended";
        let sector = data.sector;

        try {
            let company_logo = base + 'storage/' + data.company_logo.file_path;
            $(".sector_company_logo_img").attr("src", company_logo);
        }
        catch (err) {
            let company_logo = "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/corporate-company-logo-design-template-2402e0689677112e3b2b6e0f399d7dc3_screen.jpg";
            $(".sector_company_logo_img").attr("src", company_logo);
        }


        let lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aspernatur commodi cupiditate eius esse expedita maxime minus mollitia reiciendis voluptatibus. Aliquam dolor ex expedita fugiat molestias nisi perferendis sequi sunt.";
        let summary = data.summary == null ? lorem : data.summary;

        $(".sector_company_summary").html(summary);


        let outstanding_shares = new Intl.NumberFormat().format(data.outstanding_shares.outstanding_shares);
        let balance_sheet = new Intl.NumberFormat().format(data.balance_sheet.balance_sheet);

        const arrayData = [
            [sector, status, outstanding_shares, balance_sheet]
        ];

        console.log("HMMMMM", api_base);
        let the_link = "http://192.168.100.89:8000/";
        fetch(the_link + 'api/price_sheet/summary/' + data.id).then(function (response) {
            return response.json();
        }).then(function (data) {
            let change = parseFloat(data.change).toFixed(2);
            let market_cap = parseFloat(data.market_cap);
            let name = data.name;
            let symbol = data.symbol;
            let percentage_change = parseFloat(data.percentage_change).toFixed(2);
            let price = Intl.NumberFormat().format(parseFloat(data.price));
            let sector = data.sector;
            let sector_market_cap = parseFloat(data.sector_market_cap);

            let percent = ((market_cap/sector_market_cap) * 100).toFixed(2);

            $('.sector_company_price').text(price);
            $('.sector_company_market_cap').text(Intl.NumberFormat().format(data.market_cap));
            $('.sector_company_change').text(change);
            $('.sector_company_percentage_change').text(percentage_change);

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("CH299029678");

            var chart = am4core.create("sector_company_market_share_chart", am4charts.PieChart);

            // Set data
            var selected;
            var types = [
                {
                    type: "SECTOR",
                    percent: 100 - percent,
                    color: chart.colors.getIndex(0),
                }, 
                {
                    type: symbol.toUpperCase(),
                    percent: percent,
                    color: chart.colors.getIndex(13),
                }
            ];

            chart.data = generateChartData();

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "percent";
            pieSeries.dataFields.category = "type";
            pieSeries.slices.template.propertyFields.fill = "color";
            pieSeries.slices.template.propertyFields.isActive = "pulled";
            pieSeries.slices.template.strokeWidth = 0;

            function generateChartData() {
            var chartData = [];
            for (var i = 0; i < types.length; i++) {
                if (i == selected) {
                for (var x = 0; x < types[i].subs.length; x++) {
                    chartData.push({
                    type: types[i].subs[x].type,
                    percent: types[i].subs[x].percent,
                    color: types[i].color,
                    pulled: true
                    });
                }
                } else {
                chartData.push({
                    type: types[i].type,
                    percent: types[i].percent,
                    color: types[i].color,
                    id: i
                });
                }
            }
            return chartData;
            }

            pieSeries.slices.template.events.on("hit", function(event) {
            if (event.target.dataItem.dataContext.id != undefined) {
                selected = event.target.dataItem.dataContext.id;
            } else {
                selected = undefined;
            }
            chart.data = generateChartData();
            });
            
            } 
        );
        //end
        }, base
    );

    // ____________________________ FETCH THE COMPANY DETAILS AND DISPLAY ____________

    modal.style.display = "block";
}