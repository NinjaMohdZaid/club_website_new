<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="myChart" style="width:100%;"></canvas>

<script>
var xValues = ["Orders", "Products", "Users", "Bookings", "Clubs"];
var yValues = [55, 49, 44, 24, 18];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Report Today 2023"
    }
  }
});
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script type="text/javascript">
window.onload = function () {  
  var stockChart = new CanvasJS.StockChart("chartContainer",{
    title:{
      text:"Total Bookings Graph 2023"
    },
    animationEnabled: true,
    exportEnabled: true,
    charts: [{
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true
        }
      },
      axisY: {
        crosshair: {
          enabled: true,
          //snapToDataPoint: true
        }
      },
      data: data
    }],    
    rangeSelector: {
      inputFields: {
        startValue: 40,
        endValue: 600,
        valueFormatString: "###0"
      },
      
      buttons: [{
        label: "1000",
        range: 1000,
        rangeType: "number"
      },{
        label: "2000",
        range: 2000,
        rangeType: "number"
      },{
        label: "5000",
        range: 5000,
        rangeType: "number"
      },{
        label: "All",        
        rangeType: "all"
      }]
    }
  });

  stockChart.render();    
}

var limit = 10000;    //increase number of dataPoints by increasing this
var y = 1000;
var data = []; var dataSeries = { type: "spline" };
var dataPoints = [];
for (var i = 0; i < limit; i += 1) {
  y += Math.round((Math.random() * 10 - 5));
  dataPoints.push({ x: i, y: y });
}
dataSeries.dataPoints = dataPoints;
data.push(dataSeries);
</script>

<div id="chartContainer" style="height: 400px; width: 100%;"></div>
    