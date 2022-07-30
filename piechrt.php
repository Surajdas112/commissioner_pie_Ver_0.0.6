<head>
	<!-- Load plotly.js into the DOM -->
	<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
</head>

<body>
	<div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>

    <div id='myDiv2'><!-- Plotly chart will be drawn inside this DIV --></div>
</body>

<script>
    var myPlot = document.getElementById('myDiv');

// var data = [
//   {
//     x: ['giraffes', 'orangutans', 'monkeys'],
//     y: [20, 14, 23],
//     type: 'bar'
//   }
// ];








var data = [{
  type: "pie",
  values: [2, 3, 4, 4],
  labels: ["Wages", "Operating expenses", "Cost of sales", "Insurance"],
  textinfo: "label+percent",
  insidetextorientation: "radial"
}]





var layout = [{
  height: 700,
  width: 700
}]

Plotly.newPlot('myDiv', data);

myPlot.on('plotly_click', function(data){
        var pts = '';
        var pts = '';
    for(var i=0; i < data.points.length; i++){
        pts = 'label = '+ data.points[0].label + '\nvalue = ' + data.points[0].value;
    }
    alert('You clicked:\n\n'+pts);
});







// var myPlot = document.getElementById('myDiv'),
//     d3 = Plotly.d3,
//     N = 16,
//     x = d3.range(N),
//     y = d3.range(N).map( d3.random.normal() ),
//     data = [ { x:x, y:y, type:'scatter',
//             mode:'markers', marker:{size:16} } ],

// myPlot.on('plotly_click', function(data){
//     var pts = '';
//     for(var i=0; i < data.points.length; i++){
//         pts = 'label(country) = '+ data.points[0].label + '\nvalue(%) = ' + data.points[0].value;
//     }
//     alert('Closest point clicked:\n\n'+pts);
// });



var myPlot = document.getElementById('myDiv2');

var data2 = [
  {
    x: ['giraffes', 'orangutans', 'monkeys'],
    y: [20, 14, 23],
    type: 'bar'
  }
];

Plotly.newPlot('myDiv2', data2);

myPlot.on('plotly_click', function(data2){
        var pts = '';
    for(var i=0; i < data2.points.length; i++){
        pts = 'x = '+data2.points[i].x +'\ny = '+
            data2.points[i].y.toPrecision(4) + '\n\n';
    }
    alert('Closest point clicked:\n\n'+pts);
    console.log('Closest point clicked:\n\n',pts);
});



</script>