// var multiSelect = new IconicMultiSelect({
//     select: "#companies",
//     customCss: true,
// })

var multiSelect = new IconicMultiSelect({
    data: [
        { id: 1, item: 'Option 1'},
        { id: 2, item: 'Option 2'},
        { id: 3, item: 'Option 3'}
    ],
    textField: 'item',
    valueField: 'id',
    select: "#companies__",
})


multiSelect.init();

multiSelect.subscribe(function(e) {
    console.log(e);
});
