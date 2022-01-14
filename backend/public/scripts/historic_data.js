$(document).ready(function () {
    fetch('/api/historic_data').then(function (response) {
        return response.json();
    }).then(function (data) {
        return display(data);
    });
});

function display(data) {
    let dataset = [];
    console.log(data)
    data.data.forEach(function (entry) {
        const company = `<a title="${ entry.company.name }" href="#"> ${entry.company.symbol.toUpperCase()} </a>`;
        const open = formatter.format(parseFloat(entry.open) * 100);
        const high = formatter.format(parseFloat(entry.high) * 100);
        const low = formatter.format(parseFloat(entry.low) * 100);
        const close = formatter.format(parseFloat(entry.close) * 100);
        const vwap = formatter.format(parseFloat(entry.vwap) * 100);
        const volume = new Intl.NumberFormat().format(parseFloat(entry.volume));
        const value = formatter.format(parseFloat(entry.value) * 100);
        const turnover = formatter.format(parseFloat(entry.value) * 100);
        const percentage_change = parseFloat(entry.percentage_change).toFixed(2);
        const change = parseFloat(entry.change).toFixed(2);
        const date = entry.date;


        let newRow = [
            company,
            open,
            high,
            low,
            close,
            vwap,
            volume,
            value,
            turnover,
            percentage_change,
            change,
            date
        ]
        dataset.push(newRow);
        }
    );
    $('#historic').DataTable({
        data: dataset,
        "pageLength": 100,
        columns: [
            { title: "Company"},
            { title: "OPEN"},
            { title: "HIGH"},
            { title: "LOW"},
            { title: "CLOSE"},
            { title: "VWAP"},
            { title: "VOLUME"},
            { title: "VALUE"},
            { title: "TURNOVER"},
            { title: "CHANGE %"},
            { title: "CHANGE"},
            { title: "DATE"},
        ]
    });
}



const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
});
