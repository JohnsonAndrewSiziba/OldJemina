$(document).ready(function () {
    fetch('/site/backend/public/api/reports').then(function (response) {
        return response.json();
    }).then(function (data) {
        return display(data);
    });
});

function display(data){
    let dataset = [];
    data.forEach(function (entry) {
            let type = entry.report_type.type;
            let title = entry.title;
            let from_date = entry.from_date;
            let to_date = entry.to_date;
            let path = 'storage/' + entry.path;
            path = `<a href="/site/backend/public/reports/${entry.id}">VIEW</a>`
            console.log(path);

        let newRow = [
                title,
                from_date,
                to_date,
                type,
                path,
            ];
        dataset.push(newRow);

        }
    );

    $('#reports').DataTable({
        data: dataset,
        "pageLength": 100,
        columns: [
            { title: "TITLE"},
            { title: "DATE FROM"},
            { title: "DATE TO"},
            { title: "REPORT TYPE"},
            { title: "ACTIONS"}
        ]
    });
}

