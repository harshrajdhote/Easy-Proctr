window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
      exportEnabled: true,
      animationEnabled: true,
      title:{
          text: "Count Statistics"
      },
      subtitles: [{
          text: "Click Legend to Hide or Unhide Data Series"
      }], 
      axisX: {
          title: "tests"
      },
      axisY: {
          title: "Pass",
          titleFontColor: "#4F81BC",
          lineColor: "#4F81BC",
          labelFontColor: "#4F81BC",
          tickColor: "#4F81BC",
          includeZero: true
      },
      axisY2: {
          title: "Fail",
          titleFontColor: "#C0504E",
          lineColor: "#C0504E",
          labelFontColor: "#C0504E",
          tickColor: "#C0504E",
          includeZero: true
      },
      toolTip: {
          shared: true
      },
      legend: {
          cursor: "pointer",
          itemclick: toggleDataSeries
      },
      data: [{
          type: "column",
          name: "Pass",
          showInLegend: true,      
          yValueFormatString: "#,##0.# Students",
          dataPoints: [
              { label: "Test 1",  y: 19034.5 },
              { label: "Test 2", y: 20015 },
              
          ]
      },
      {
          type: "column",
          name: "Fail",
          axisYType: "secondary",
          showInLegend: true,
          yValueFormatString: "#,##0.# Students",
          dataPoints: [
              { label: "Test 1", y: 210.5 },
              { label: "Test 2", y: 135 },
              
          ]
      }]
  });
  chart.render();
  
  function toggleDataSeries(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
      } else {
          e.dataSeries.visible = true;
      }
      e.chart.render();
  }
  
  
  var chart = new CanvasJS.Chart("onoffContainer", {
      animationEnabled: true,
      title: {
          text: "Online Exam"
      },
      data: [{
          type: "pie",
          startAngle: 240,
          yValueFormatString: "##0.00\"%\"",
          indexLabel: "{label} {y}",
          dataPoints: [
            {y: 73.7, label: "Pass"},
            {y: 26.3, label: "Fail"},
              
             
          ]
      }]
  });
  chart.render();
  
  var chart = new CanvasJS.Chart("passfailContainer", {
      animationEnabled: true,
      title: {
          text: "Offline Exams"
      },
      data: [{
          type: "pie",
          startAngle: 240,
          yValueFormatString: "##0.00\"%\"",
          indexLabel: "{label} {y}",
          dataPoints: [
              {y: 43.7, label: "Pass"},
              {y: 56.3, label: "Fail"},
              
          ]
      }]
  });
  chart.render();
  
  
  }
  
  
  
  
  
  