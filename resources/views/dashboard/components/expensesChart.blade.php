<div class="shadow-md">
    <div id="piechart" style="width: 600px; height: 300px;"></div>
</div>  


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();

        // var data = google.visualization.arrayToDataTable([
        //     ['Name', 'Monto'],
        //     <?php 
        //         foreach($expenses as $expense){
        //             foreach($expense->categories as $category){
        //                 echo "['".$category->name."',".$expense->amount."],";
        //             }
        //         }
        //     ?>
        // ]);

        var data = google.visualization.arrayToDataTable([
            ['Fecha', 'Monto'],
            <?php 
                foreach($expenses as $expense){
                    echo "['".$expense->created_at."',".$expense->amount."],";
                }
            ?>
        ]);

        // var options = {
        //     title: 'Últimos gastos',
        //     is3D: false,
        //     'width':500,
        //     'height':300
        // };

    //   var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    //   chart.draw(data, options);

    var options = {
        title: 'Últimos gastos',
        hAxis: {
          title: 'Día',
        },
        vAxis: {
          title: 'Monto',
          viewWindow: {
            max: [5, 5, 5]
          }
        },
        colors: ['#10b981']
      };

        var chart = new google.charts.Bar(document.getElementById('piechart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

    }
</script>
