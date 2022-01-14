$(document).ready(function () {
    main();
});

function main(){
 
    let api_base = "/site/backend/public/";

    let featuredReports = new FeaturedReports(api_base);
    featuredReports.fetchAndDisplay();
    
}


class FeaturedReports{
    constructor(api_base){
        this.api_base = api_base
    }

    fetchAndDisplay(){
        fetch(this.api_base + 'api/featured_reports')
        .then(function (response) {
            return response.json();
        }).then(function (data) {
            console.log("Featured: ", data);
            let data_array = [];
            data.forEach(function (entry) {
                let id = entry.id;
                let type = entry.report_type.type;
                const from_date = entry.from_date;
                
                const to_date = entry.to_date;
                // const type = entry.report_type;
                const type_id = entry.report_type;
                
                let the_type_link = `<a href="/${spacesToDashes(type)}/${to_date}/${entry.id}">${entry.report_type.type}</a>`;
                let date = `<a href="/${spacesToDashes(type)}/${to_date}/${entry.id}">${to_date}</a>`;
                
                let newRow = [
                    the_type_link,
                    date,
                ]
                data_array.push(newRow);
             }
            ); // foreach


            $('#featured_reports_table_').DataTable({
                data: data_array,
                "info": false,
                "pageLength": 100,
                ordering: false,
                searching: false,
                paging: false,
                columns: [
                    { title: "REPORT TYPE"},
                    { title: "DATE"}
                ]
            }); 

                
        }
        )
    }
}

function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase().replace(/[\])}[{(]/g, '');
}