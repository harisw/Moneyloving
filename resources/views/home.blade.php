<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Welcome to MoneyLover!!!
                </div>
                <div class="links">
                    <a href="{{url('/income/new')}}">Add Income</a>
                    <a href="{{url('/expense/new')}}">Add Expense</a>
                </div>
            </div>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped" id="example">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Receipt</th>
                    <th>Details</th>
                </thead>
                <tbody>
                    @foreach($rec as $data)
                    <tr>
                        <td>{{$data->type}}</td>
                        <td>{{$data->judul_transaksi}}</td>
                        <td>Rp. {{number_format($data->jumlah)}}</td>
                        <td>@if($data->category) {{$data->category}} @else - @endif</td>
                        <td>{{date('d F Y', strtotime($data->created_at))}}</td>
                        <td>@if($data->foto)
                            <button type="button" data-toggle="modal" data-target="#receiptModal" data-id="{{$data->id}}" class="btn btn-sm btn-success btn-fill">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            </button>
                            @else -
                            @endif
                        </td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#detailModal" data-id="{{$data->id}}" class="btn btn-sm btn-success btn-fill">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </body>
</html>
