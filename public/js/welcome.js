$(document).ready(function() {
   $(function () {
      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);
      var PieData;
      $.getJSON("/categories-stats",
      function(data){ //data est la fonction de retour
         PieData=data;
         pieChart.Doughnut(PieData, pieOptions);
      });
      var pieOptions = {
         //Boolean - Whether we should show a stroke on each segment
         segmentShowStroke: true,
         //String - The colour of each segment stroke
         segmentStrokeColor: "#fff",
         //Number - The width of each segment stroke
         segmentStrokeWidth: 2,
         //Number - The percentage of the chart that we cut out of the middle
         percentageInnerCutout: 50, // This is 0 for Pie charts
         //Number - Amount of animation steps
         animationSteps: 100,
         //String - Animation easing effect
         animationEasing: "easeOutBounce",
         //Boolean - Whether we animate the rotation of the Doughnut
         animateRotate: true,
         //Boolean - Whether we animate scaling the Doughnut from the centre
         animateScale: false,
         //Boolean - whether to make the chart responsive to window resizing
         responsive: true,
         // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
         maintainAspectRatio: true,
         //String - A legend template
         legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
      };



      "use strict";
      //DONUT CHART
      $.getJSON("/articles-stats",
      function(data){
         var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a", "#56fa1b"],
            data: data,
            hideHover: 'auto'
         });
      });



      $.getJSON("/commentaires-stats",
      function(data){
         var line= new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: data,
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
         });
      });
   });
});
