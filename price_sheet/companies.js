$(document).ready(function () {
    main();
});

function main(){
    // let api_base = "http://192.168.100.89:8000/";
    
    let api_base = "/site/backend/public/";
    
    let companies = new Companies(api_base);
    companies.fetchAndDisplay();

    let featuredCompanies = new FeaturedCompanies(api_base);
    featuredCompanies.fetchAndDisplay();
    
}


class FeaturedCompanies{
    constructor(api_base){
        this.api_base = api_base
    }

    fetchAndDisplay(){
        console.log("Show featured companies");
        console.log(this.api_base + 'api/featured_companies');
        fetch(this.api_base + 'api/featured_companies')
        .then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log("Featured: ", data);
            let data_array = [];
            data.forEach(function (entry) {
                let id = entry.id;
                let symbol = `<span style="cursor: pointer" onclick="showSnippert(${id})"  >${entry.symbol.toUpperCase()}</span>`;
                let name = `<span style="cursor: pointer" onclick="showSnippert(${id})"  >${entry.name}</span>`;
                
                let newRow = [
                    symbol,
                    name,
                ]
                data_array.push(newRow);
             }
            ); // foreach


            $('#featured_companies_table').DataTable({
                data: data_array,
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
        )
    }
}

function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase().replace(/[\])}[{(]/g, '');
}

class Companies{
    constructor(api_base){
        this.api_base = api_base
    }

    fetchAndDisplay(){
        fetch(this.api_base + 'api/companies_page')
        .then(function (response) {
            return response.json();
        }).then(function (data) {
                console.log(data);
                let zse = data.zse;
                let vfex = data.vfex;
                let etf = data.etf;

                let zse_data = [];
                let vfex_data = [];
                let etf_data = [];

                zse.forEach(function (entry) {
                    let id = entry.id;
                    let name = `<a title="View Company Details" href="/company/${spacesToDashes(entry.name)}/${id}"> ${entry.name} </a>`;
                    let symbol = `<a title="View Company Details" href="/company/${spacesToDashes(entry.name)}/${id}"> ${entry.symbol.toUpperCase()} </a>`;;

                    let newRow = [
                        symbol,
                        name,
                    ]
                    zse_data.push(newRow);
                    
                 }
                );

                vfex.forEach(function (entry) {
                    let id = entry.id;
                    let name = `<a title="View Company Details" href="/vfex/${spacesToDashes(entry.name)}/${id}"> ${entry.name} </a>`;
                    let symbol = `<a title="View Company Details" href="/vfex/${spacesToDashes(entry.name)}/${id}"> ${entry.symbol.toUpperCase()} </a>`;;
                    let newRow = [
                        symbol,
                        name,
                    ]
                    vfex_data.push(newRow);
                    }
                );

                etf.forEach(function (entry) {
                    let id = entry.id;
                    // const company = `<a title="${ entry.etf.name }" href="/etf/${spacesToDashes(entry.etf.name)}/${entry.etf.id}"> ${entry.etf.symbol.toUpperCase()} </a>`;
                    let name = `<a title="View Company Details" href="/etf/${spacesToDashes(entry.name)}/${id}"> ${entry.name} </a>`;
                    let symbol = `<a title="View Company Details" href="/etf/${spacesToDashes(entry.name)}/${id}"> ${entry.symbol.toUpperCase()} </a>`;;

                    let newRow = [
                        symbol,
                        name,
                    ]
                    etf_data.push(newRow);
                    }
                );


                // --------------------DISPLAY TABLES ------------------------------
                $('#zse_equity').DataTable({
                    data: zse_data,
                    // "info": false,
                    "pageLength": 100,
                    paging: false,
                    columns: [
                        { title: "SYMBOL"},
                        { title: "NAME"}
                    ]
                });

                $('#zse_etfs').DataTable({
                    data: etf_data,
                    "info": false,
                    "searching": false,
                    ordering: false,
                    "pageLength": 100,
                    paging: false,
                    columns: [
                        { title: "SYMBOL"},
                        { title: "NAME"}
                    ]
                });

                $('#vfex').DataTable({
                    data: vfex_data,
                    "info": false,
                    "searching": false,
                    ordering: false,
                    "pageLength": 100,
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
        let the_link = "/site/backend/public/";
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