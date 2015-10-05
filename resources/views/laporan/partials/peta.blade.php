<html>
  <head>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['Kabupaten', 'Jumlah kasus'],
        ['Bantul, Yogyakarta', 10],
        ['Gunungkidul, Yogyakarta', 20],
        ['Kulon Progo, Yogyakarta', 10],
        ['Sleman, Yogyakarta', 30],
        ['Yogyakarta, Yogyakarta', 50]
      ]);

      var options = {
        region: 'ID',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']},
        magnifyingGlass: {enable: true, zoomFactor: 15}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>