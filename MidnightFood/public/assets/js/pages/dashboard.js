var arrayData = [];
var arrayData2 = [];

function findMonth(month, dataJson) {
    var ret = 0;
    for (let index = 0; index < dataJson.length; index++) {
        if (dataJson[index].month == month) {
            ret = dataJson[index].sum;
        }
    }
    return ret
}
var chartProfileVisit
var chartProfileVisit2

$(document).ready(function () {
    var url = '/admin/chart';
    $.get(url, function (data) {
        for (let i = 0; i < 12; i++) {
            arrayData[i] = findMonth(i + 1, data.data);
        }
        chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();

    });
});
$(document).ready(function () {
    var url = '/admin/chart';
    $.get(url, function (data) {
        for (let i = 0; i < 12; i++) {
            arrayData2[i] = findMonth(i + 1, data.data2);
        }
        chartProfileVisit2 = new ApexCharts(document.querySelector("#chart-profile-visit-2"), optionsProfileVisit2);
        chartProfileVisit2.render();

    });
});


var optionsProfileVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {},
    series: [{
        name: 'sales',
        data: arrayData,

        // [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]
    }],
    colors: '#28a745',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}
var optionsProfileVisit2 = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {},
    series: [{
        name: 'sales',
        data: arrayData2,

        // [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]
    }],
    colors: '#dc3545',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);

var chartProfileVisit2 = new ApexCharts(document.querySelector("#chart-profile-visit-2"), optionsProfileVisit2);

