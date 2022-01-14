$(document).ready(function () {
    main();
});

function main(){
    // let api_base = "http://127.0.0.1:8000/";
    let api_base = "/site/backend/public/";
    
    let theUrl = $(location).attr("href")

    let theSplit = theUrl.split("/");


    let id = theUrl.split("/")[5];


    console.log(id);


    let reportData = new ReportData(id, api_base, "2021-10-01", "2021-10-01", 1 );
    reportData.fetchAndDisplay();

}

class ReportData{
    constructor(id, api_base, start_date, end_date, type){
        this.id = id;
        this.api_base = api_base
        this.start_date = start_date;
        this.end_date = end_date;
        this.type = type
    }


    fetchAndDisplay(){
        const the_base = this.api_base;
        console.log(this.api_base + 'api/get_report_text/' + this.id + "/" + this.start_date + "/" + this.end_date + "/" + this.type);
        fetch(this.api_base + 'api/get_report_text/' + this.id + "/" + this.start_date + "/" + this.end_date + "/" + this.type).then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log(data);

            let report = data.report;

            let title = report.title;
            let path = the_base + 'storage/' + report.path;
            let report_type = report.report_type.type;
            let from_date = report.from_date;
            let to_date = report.to_date;

            let section_1 = report.section_1;
            let section_1_title = report.section_1_title;

            let section_2 = report.section_2;
            let section_2_title = report.section_2_title;

            let section_3 = report.section_3;
            let section_3_title = report.section_3_title;

            let section_4 = report.section_4;
            let section_4_title = report.section_4_title;

            $('#page_title').text($('#page_title').text() + " " + title);
            $('.title').text(title);

            $('.section_1_title').text(section_1_title);
            $('.section_1').html(section_1);

            $('.section_2_title').text(section_2_title);
            $('.section_2').html(section_2);

            $(".download_link").attr("href", path);
            $(".download_link").prop("href", path);


            let topTradersData = data.top_traders;

            // _________________________________VALUE LEADERS
            am4core.useTheme(am4themes_animated);
            am4core.addLicense("CH299029678");
            var chart = am4core.create("value_leaders", am4charts.PieChart);
        
            // Set data
            var selected;

            
            let values_data = topTradersData.values_array;

            let top_5_values_total = parseFloat(data.top_traders.values_total);

            let all_values_total = parseFloat(data.top_traders.all_companies_value);

            let company_1_value = "-";
            let company_1_percent = "-";
            let company_1_symbol = "-";

            let company_2_value = "-";
            let company_2_percent = "-";
            let company_2_symbol = "-";

            let company_3_value   = "-";
            let company_3_percent = "-";
            let company_3_symbol  = "-";

            let company_4_value   = "-";
            let company_4_percent = "-";
            let company_4_symbol  = "-";


            let company_5_value   = "-";
            let company_5_percent = "-";
            let company_5_symbol  = "-";

            let others_value   = "-";
            let others_percent = "-";

            try {
                company_1_value =  parseFloat(values_data[0].traded_value);
                company_1_percent = ((company_1_value / all_values_total) * 100).toFixed(2);
                company_1_symbol = values_data[0].company_id.symbol.toUpperCase();

                company_2_value = parseFloat(values_data[1].traded_value);
                company_2_percent = ((company_2_value / all_values_total) * 100).toFixed(2);
                company_2_symbol = values_data[1].company_id.symbol.toUpperCase();

                company_3_value   = parseFloat(values_data[2].traded_value);
                company_3_percent = ((company_3_value / all_values_total) * 100).toFixed(2);
                company_3_symbol  = values_data[2].company_id.symbol.toUpperCase();

                company_4_value   = parseFloat(values_data[3].traded_value);
                company_4_percent = ((company_4_value / all_values_total) * 100).toFixed(2);
                company_4_symbol  = values_data[3].company_id.symbol.toUpperCase();

                company_5_value   = parseFloat(values_data[4].traded_value);
                company_5_percent = ((company_5_value / all_values_total) * 100).toFixed(2);
                company_5_symbol  = values_data[4].company_id.symbol.toUpperCase();

                others_value   = all_values_total - top_5_values_total;
                others_percent = ((others_value / all_values_total) * 100).toFixed(2);
            }
            catch (ex){
                document.getElementById('v_ldr').style.display = 'none';
            }



            var types = [
                {
                    type: company_1_symbol,
                    percent: company_1_percent,
                    color: chart.colors.getIndex(0),
                }, 
                {
                    type: company_2_symbol,
                    percent: company_2_percent,
                    color: chart.colors.getIndex(1),
                },
                {
                    type: company_3_symbol,
                    percent: company_3_percent,
                    color: chart.colors.getIndex(2),
                },
                {
                    type: company_4_symbol,
                    percent: company_4_percent,
                    color: chart.colors.getIndex(3),
                },
                {
                    type: company_5_symbol,
                    percent: company_5_percent,
                    color: chart.colors.getIndex(4),
                },
                {
                    type: "OTHERS",
                    percent: others_percent,
                    color: chart.colors.getIndex(5),
                }
            ];
        
            // Add data
            chart.data = generateChartData();
        
            // Add and configure Series
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
            // _________________________________VALUE LEADERS END



            // _________________________________VALUE LEADERS
            am4core.useTheme(am4themes_animated);
            am4core.addLicense("CH299029678");
            var chart = am4core.create("volume_leaders", am4charts.PieChart);
        
            // Set data
            var selected;
            
            values_data = topTradersData.volumes_array;

            top_5_values_total = parseFloat(data.top_traders.volumes_total);

            all_values_total = parseFloat(data.top_traders.all_companies_volume);

            try {
                company_1_value = parseFloat(values_data[0].traded_volume); //value is volume.
                company_1_percent = ((company_1_value / all_values_total) * 100).toFixed(2);
                company_1_symbol = values_data[0].company_id.symbol.toUpperCase();
                
                company_2_value = parseFloat(values_data[1].traded_volume);
                company_2_percent = ((company_2_value / all_values_total) * 100).toFixed(2);
                company_2_symbol = values_data[1].company_id.symbol.toUpperCase();

                company_3_value = parseFloat(values_data[2].traded_volume);
                company_3_percent = ((company_3_value / all_values_total) * 100).toFixed(2);
                company_3_symbol = values_data[2].company_id.symbol.toUpperCase();

                company_4_value = parseFloat(values_data[3].traded_volume);
                company_4_percent = ((company_4_value / all_values_total) * 100).toFixed(2);
                company_4_symbol = values_data[3].company_id.symbol.toUpperCase();

                company_5_value = parseFloat(values_data[4].traded_volume);
                company_5_percent = ((company_5_value / all_values_total) * 100).toFixed(2);
                company_5_symbol = values_data[4].company_id.symbol.toUpperCase();

                others_value = all_values_total - top_5_values_total;
                others_percent = ((others_value / all_values_total) * 100).toFixed(2);
            }

            catch (ex){
                document.getElementById('vol_ldr').style.display = 'none';
                document.getElementById('unavail').style.display = 'block';
                
            }



            var types = [
                {
                    type: company_1_symbol,
                    percent: company_1_percent,
                    color: "#00FF00",
                }, 
                {
                    type: company_2_symbol,
                    percent: company_2_percent,
                    color: chart.colors.getIndex(1),
                },
                {
                    type: company_3_symbol,
                    percent: company_3_percent,
                    color: chart.colors.getIndex(2),
                },
                {
                    type: company_4_symbol,
                    percent: company_4_percent,
                    color: chart.colors.getIndex(3),
                },
                {
                    type: company_5_symbol,
                    percent: company_5_percent,
                    color: chart.colors.getIndex(4),
                },
                {
                    type: "OTHERS",
                    percent: others_percent,
                    color: chart.colors.getIndex(5),
                }
            ];
        
            // Add data
            chart.data = generateChartData();
        
            // Add and configure Series
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

            // _________________________________VALUE LEADERS END

            var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
            if(to_date == from_date){
                from_date = new Date(from_date).toLocaleDateString("en-UK", options);
                $('.the_dates').text(from_date)
            }
            
            else {
                to_date = new Date(to_date).toLocaleDateString("en-UK", options);
                from_date = new Date(from_date).toLocaleDateString("en-UK", options);

                const display_date = from_date + " to " + to_date;
                $('.the_dates').text(display_date)
            }


            let indices = data.indices;
            
            if(!(indices.length == 0)){
                $("#indices_chart_div").css('display', 'block');
                let gainersArray = [];
                let shakersArray = [];
                let topTradesArray = [];

                let indicesArray = [
                    [
                        "ZSE ALL SHARE",
                        new Intl.NumberFormat().format(indices.all_share_open),
                        new Intl.NumberFormat().format(indices.all_share_close),
                        indices.all_share_change.toFixed(2)
                    ],
                    ["ZSE TOP 10", indices.top_ten_open, indices.top_ten_close, indices.top_ten_change.toFixed(2)],
                    ["ZSE TOP 15", indices.top_15_open, indices.top_15_close, indices.top_15_change.toFixed(2)],
                    ["MEDIUM CAP", indices.medium_cap_open, indices.medium_cap_close, indices.medium_cap_change.toFixed(2)],
                    ["SMALL CAP", indices.small_cap_open, indices.small_cap_close, indices.small_cap_change.toFixed(2)]
                ];


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

            

            // _____________________ GAINERS ________________________________________

            let dataSet = [];

            let gainers = data.gainers;
            let gainers_values = data.gainers_values;

            let index = 0;
            gainers.forEach( gainer => {
                console.log(gainer)
                    let newRow = [
                        gainer[0].name,
                        gainers_values[index].toFixed(2),
                    ]
                    index += 1;
                    dataSet.push(newRow);
            } );

            $(document).ready(function() {
                $('#gainers_table').DataTable( {
                    data: dataSet,
                    "info": false,
                    "pageLength": 5,
                    lengthChange: false,
                    processing: true,
                    deferRender: true,
                    searching: false,
                    paging: false,
                    ordering: false,
                    columns: [
                        { title: "COUNTER" },
                        { title: "% CHANGE" },
                    ]
                } );
            } );

            // _____________________ GAINERS ________________________________________



            // _____________________ SHAKERS ________________________________________
            dataSet = [];
            gainers = data.shakers;
            gainers_values = data.shakers_values;
            index = 0;

            gainers.forEach( gainer => {
                console.log(gainer)
                    let newRow = [
                        gainer[0].name,
                        gainers_values[index].toFixed(2),
                    ]
                    index += 1;
                    dataSet.push(newRow);
            } );

            $(document).ready(function() {
                $('#shakers_table').DataTable( {
                    data: dataSet,
                    "info": false,
                    "pageLength": 5,
                    lengthChange: false,
                    processing: true,
                    deferRender: true,
                    searching: false,
                    paging: false,
                    ordering: false,
                    columns: [
                        { title: "COUNTER" },
                        { title: "% CHANGE" },
                    ]
                } );
            } );








            // _____________________ SHAKERS ________________________________________



            var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
            from_date = new Date(from_date).toLocaleDateString("en-UK", options);

            
            let companies = report.companies_in_report;
            companies.forEach(function (company) {
                    let name = company.name;
                    let symbol = company.symbol;
                    let id = company.id;
                }
            )

            
        }, the_base);
    }
}

function getID(name) {
    return (location.search.split(name + '=')[1] || '').split('&')[0];
}