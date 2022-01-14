// http://127.0.0.1:8000/api/company_snippet

$(document).ready(function () {
    main();
});

function main(){
    // let api_base = "http://127.0.0.1:8000/";
    // let api_base = "http://192.168.100.89:8000/";
    let companyDetails = new CompanySnippet(api_base);
    companyDetails.fetchAndDisplay();
}

function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase();
}

class CompanySnippet{
    constructor(api_base){
        this.api_base = api_base;
    }
    fetchAndDisplay(){
        console.log(this.api_base + 'api/company_snippet');
        let base = this.api_base;
        fetch(this.api_base + 'api/company_snippet').then(function (response) {
            return response.json();
        }).then(function (data) {
            let name = data.name;
            $('.name').text(name);

            let symbol = data.symbol;
            $('.symbol').text(symbol);

            let link = `company_details.php?company=${data.id}`;
            link = `/company/${spacesToDashes(name)}/${data.id}}`
            $('.link').attr("href", link);

            let status = data.status == 1 ? "Active" : "Suspended";
            let sector = data.sector;

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


            let outstanding_shares = new Intl.NumberFormat().format(data.outstanding_shares.outstanding_shares);
            let balance_sheet = new Intl.NumberFormat().format(data.balance_sheet.balance_sheet);

            const arrayData = [
                [sector, status, outstanding_shares, balance_sheet]
            ];


            fetch(base + 'api/summary/' + data.id).then(function (response) {
                return response.json();
            }).then(function (data) {
                let change = parseFloat(data.change).toFixed(2);
                let market_cap = parseFloat(data.market_cap);
                let name = data.name;
                let symbol = data.symbol;
                let percentage_change = parseFloat(data.percentage_change).toFixed(2);
                let price = Intl.NumberFormat().format(parseFloat(data.price) / 100);
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
            //end
            }, base
        );
            
    }
}