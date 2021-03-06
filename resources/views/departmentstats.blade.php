@extends('layouts.admin')


<!-- Bootstrap library -->


@section('content')
<!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <canvas id="secondChart" height="280" width="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;
    var usterki = <?php echo $usterki; ?>;
    var usterkifinished = <?php echo $usterkifinished; ?>;
    var entryforuser=<?php echo $entryforuser; ?>;
    var users = <?php echo $users; ?>;
    var finishedentries=<?php echo $finishedentries; ?>;
    var barChartData = {
        labels: month, 
        datasets: [{
            label: 'Wpisy',
            backgroundColor: "lightgreen",
            data: usterki
        },
            {
            label: 'Ukończone Wpisy',
            backgroundColor: "lightyellow",
            data: usterkifinished
            }
    ]
    };
    var barChart2Data = {
        labels: users, 
        datasets: [{
            label: 'Wpisy',
            backgroundColor: "lightgreen",
            data: entryforuser
        },
        {
            label: 'Ukończone Wpisy',
            backgroundColor: "lightyellow",
            data:   finishedentries
            }
    ]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Ilość wpisów w danym miesiącu OŚ Y=LICZBA WPISÓW OŚ X=MIESIĄCE'
                }
            }
        });

        var ctx2 = document.getElementById("secondChart").getContext('2d');

  var secondChart = new Chart(ctx2, {
    type: 'bar',
            data: barChart2Data,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Liczba wpisów na użytkownika'
                }
            }
        });

    };
</script>


  </div>            <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->

   <script>
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
sleep(500).then(() => {
  document.getElementById("tresc").focus();
});
   </script> 

    @endsection
