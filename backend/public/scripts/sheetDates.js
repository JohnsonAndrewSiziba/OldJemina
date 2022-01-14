let url = "/site/backend/public";

$(document).ready(function () {
    fetch( url + '/api/sheet_dates').then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(data);
        let dataset = [];

        data.forEach(function (entry) {
                let date = entry.date;
                let uploaded_on = entry.created_at;
                let action = `<a class="btn btn-outline-info" href="/price_sheet/${date}">View</a>`

                let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                let formattedDate = new Date(date).toLocaleDateString("en-UK", options);
                let formattedUploadDate = new Date(uploaded_on).toLocaleDateString("en-UK", options);

                let newRow = [
                    formattedDate,
                    formattedUploadDate,
                    action
                ]
                dataset.push(newRow);
            }
        );

        $('#sheet_dates').DataTable({
            ordering: false,
            data: dataset,
            columns: [
                { title: "PRICE SHEET DATE"},
                { title: "DATE UPLOADED"},
                { title: "VIEW"},
            ]
        });
    });
});
