$(document).ready(function () {
    id = param("company");
    fetch(api_base + 'api/companies/' + id).then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(data);
        display(data);
    }).then(
        showCompaniesList()
    );
});

// 



function showCompaniesList(){
    fetch(api_base + 'api/companies/').then(function (response) {
        return response.json();
    }).then(function (data) {
        // display(data);
        // showCompaniesList();

        let companies = [];
        data.forEach(function (entry) {
            const name = entry.name;
            const id = entry.id;
            const symbol = `<a title="${ entry.name }" href="company_details.php?company=${entry.id}"> ${entry.symbol.toUpperCase()} </a>`;

            const company = [
                symbol
            ]
            companies.push(company);
        });
    
        $('#companies').DataTable( {
            data: companies,
            "info": false,
            "pageLength": 5,
            lengthChange: false,
            processing: true,
            deferRender: true,
            columns: [
                { title: "COMPANY" },
            ]
        } );
    });

}


function display(data){
    // console.log(data);
    let id = data.id;
    let name = data.name;
    let symbol = data.symbol;
    let status = data.status == 1 ? "Active" : "Suspended";
    let sector = data.sector;
    let isin_no = data.isin_no;
    let year_end = data.year_end;
    let founded = data.founded;
    let listed = data.listed;
    let historic_data = data.historic_data;
    let outstanding_shares = new Intl.NumberFormat().format(data.outstanding_shares.outstanding_shares);
    let balance_sheet = new Intl.NumberFormat().format(data.balance_sheet.balance_sheet);

    $('.name').text(name);
    $('.symbol').text(symbol.toUpperCase());

    const arrayData = [
        [sector, status, outstanding_shares, balance_sheet]
    ];

    console.log(arrayData);

    $(document).ready(function() {
        $('#company_details').DataTable( {
            data: arrayData,
            info: false,
            ordering: false,
            paging: false,
            searching: false,

            columns: [
                { title: "SECTOR" },
                { title: "STATUS" },
                { title: "SHARES" },
                { title: "BAL. SHEET" },
            ]
        } );
    } );

}

function param(name) {
    return (location.search.split(name + '=')[1] || '').split('&')[0];
}
