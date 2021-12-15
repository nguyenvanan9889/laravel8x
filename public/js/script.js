$('alo').click();
$.ajax({
    type: "method",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {
        console.log('alo');
    }
});
alert('alo');