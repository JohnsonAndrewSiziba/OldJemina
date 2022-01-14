$(document).ready(function () {
    main();
});

function main(){
    let reports = new Reports(api_base);
    reports.fetchAndDisplay();
}

class Reports{
    constructor(api_base){
        this.api_base = api_base;
    }

    fetchAndDisplay(){
        fetch(this.api_base + 'api/monthly_reports').then(function (response) {
            return response.json();
        }).then(function (data) {
                console.log(data);

                data.forEach(function (entry) {
                    const title = entry.title;
                    console.log(title);
                    const extract = truncateString(entry.section_2, 200) == null ? truncateString(entry.section_1, 200) : truncateString(entry.section_2, 200);

                    const from_date = entry.from_date;
                    const to_date = entry.to_date;
                    const type = entry.report_type;
                    const type_id = entry.report_type;
                    // const path = base + 'storage/' + entry.path;

                    const clonedCard = $('#report_template').clone();

                    
                    clonedCard.css('display', 'block');


                    let report_link = "/" + spacesToDashes(type.type) + "/" + to_date + "/" + entry.id

                    $("#report_link").attr("href", report_link);
                    $("#report_link").prop("href", report_link);


                    clonedCard.find('.report_title').text(title);
                    clonedCard.find('.extract').html(extract);
                    if(from_date == to_date) {
                        const date_string = from_date;
                        clonedCard.find('.report_dates').text(date_string);
                    } else {
                        const date_string = from_date + " - " + to_date;
                        clonedCard.find('.report_dates').text(date_string);
                    }
                    clonedCard.find('.report_type').text(type.type);
                    console.log("Type: ", type);
                    clonedCard.find('.report_link').prop("href", report_link);

                    clonedCard.appendTo("#reports_div");

                }
            );
            }
        )
    }
}

function truncateString(string, limit) {
    try{
        if (string.length > limit) {
            return string.substring(0, limit) + "..."
          } else {
            return string
          }
    }
    catch(exception){
        return string;
    }

    // if (string.length > limit) {
    //     return string.substring(0, limit) + "..."
    //   } else {
    //     return string
    //   }
  }

  function spacesToDashes(s){
    return s.replace(/\s+/g, '-').toLowerCase().replace(/[\])}[{(]/g, '');
}