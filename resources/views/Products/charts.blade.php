@extends('layouts.master')


@section('content')

hellp
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <canvas id="myChart"></canvas>

 {{-- <style>
    canvas {
        padding: 50px; 
        width: 100px;
        height: 100px;
    }
 </style> --}}


 <script>



    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url:"http://127.0.0.1:8000/apitest",
            contentType:"application/json; charset=utf-8",
            dataType: "json" ,
            success: function(response){
                console.log(response) ; 


                const ctx = document.getElementById('myChart');


                const labels = response.data.map(item => item.name);
                const prices = response.data.map(item => item.price);
                const quantities = response.data.map(item => item.quantity);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: labels,
                    datasets: [{
                        label: 'weather forcasting',
                        backgroundColor: ['red', 'blue', 'green', 'purple', 'yellow', 'black'],
                        borderColor: ['green', 'yellow', 'cyan', 'black', 'magenta', 'grey'],
                        data: prices,
                        borderWidth: 1
                            },
                        {
                        label: 'weather forcasting 2',
                        backgroundColor: ['green', 'yellow', 'cyan', 'black', 'magenta', 'grey'],
                        borderColor: ['red', 'blue', 'green', 'purple', 'yellow', 'black'],
                        data: quantities,
                        borderWidth: 1
                            },]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }},
                        plugins: {
                            title: {
                                display: true,
                                text: 'Roniska'  ,
                                align: 'end'
                            }
                    }
                    }
                });



            },
            error: function(response){
                console.log(response);
                alert("Error") ;
            },
        });

    }) ;





//   data.labels = ['ahmed' , 'abs' , 'mahmoud' , 'hema' , 'azp' ,'tal'],
//     data.datasets(0),lable = 'ahmed new' ,);
</script>







    
@endsection