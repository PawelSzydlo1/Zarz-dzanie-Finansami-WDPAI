

fetch("/getDate", {
    method: "POST"


}).then(function (response) {
    return response.json();
}).then(function (table) {
    const myDataArray = [];
    const myDataArray1 = [];
    const myDataArray2 = [];
    table.forEach(tab => {
        myDataArray1.push(tab['price_elements']);
        myDataArray2.push(tab['data']);
        console.log(myDataArray2);
    })
    myDataArray.push(myDataArray1);
    myDataArray.push(myDataArray2);
    return myDataArray;
}).then(function(myDataArray,){
    let myData=prepareData(myDataArray[0],myDataArray[1]);
    drawChart(myData);
});


function prepareData(arrayDataSet1,arrayDataSet2) {

    let myData = {
        labels: arrayDataSet2,
        datasets: [
            {
                
                label: "My expenses",
                borderColor: 'rgba(236,115,87)',
                fill: false,
                pointRadius: 4,
                pointBorderWidth: 1,
               pointBackgroundColor: 'rgba(236,115,87)',


                data: arrayDataSet1
            },


        ]
    };
    return myData;
}

function drawChart(data) {
    let options = {};

    let ctx = document.getElementById("myChart").getContext("2d");
    let myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

}

