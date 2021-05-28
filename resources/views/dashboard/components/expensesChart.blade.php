@if(count($expenses_amount) === 0)
  <div class="shadow-md h-30">
    <div class="h-48 text-center">
      <p class="text-2xl text-gray-800 ml-10 py-4">No tienes ningún gasto registrado</p>
      <div class="text-center py-2">
        <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none hover:bg-green-700 cursor-pointer">
            <a href="{{ route('expenses.create')}}" class="text-sm">
                Comienza a registrar gastos!
            </a>
        </button>
    </div>
    </div>
  </div>  
@else
  <div class="shadow-md h-30">
    <div id="piechart"></div>
  </div>  
@endif


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
                foreach($expenses_amount as $key => $value){
                    echo "['".$key."',".$value."],";
                    //echo "['".$expense->created_at->format('Y-m-d')."',".$expense->amount."],";
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
