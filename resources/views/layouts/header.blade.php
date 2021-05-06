<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2fc9b53a99.js" crossorigin="anonymous"></script>
    <title>MoneyManager</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="{{asset('js/app.js')}}"></script>
    <script type="module" src="{{ asset('js/echo.js')}}"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <div class="flex h-screen">
        @yield('sidebar')
        <div class="p-6 w-full">
            @yield('content')
        </div>
    </div>

    <script>
        $(document).ready(function() {
            console.log("ando ready");
            window.Echo.channel('ExpensesChannel').listen('NewExpenseNotification', (e) => {
                alert("se hizo un gasto de " + e.expense.amount);
            });
        });

        function expenseSearchFun() {
        input = document.getElementById("expenseSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("expenseTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                inputVal = td.textContent || td.innerText;
            if (inputVal.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                }
            }
            }
        }
    </script>
</body>
