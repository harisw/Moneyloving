<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jarmul Project 3 Group 3</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/landing-page.min.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{url('/')}}">Bandeng Lover</a>
          <a href="{{url('/income/new')}}" style="margin-left: 10px">Add Income</a>
          <a href="{{url('/expense/new')}}" style="margin-left: 20px">Add Expense</a>
        </div>
        
        <div class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Hi, {{session('username')}}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <a href="{{url('/logout')}}" class="dropdown-item">Logout</a>
          </ul>
        </div> 
      </div>
    </nav>

    <!-- Icons Grid -->
    <div class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <select class="form-control" id="sel1" onchange="location = this.value;">
              <option value="" hidden>Select Category</option>
              <option value="{{ url('/') }}">All Records</option>
              <option value="{{ url('/income') }}">Incomes</option>
              <option value="{{ url('/expense') }}">Expenses</option>
            </select>
          </div>
          <div class="col-md-9 text-right">
            @if(isset($sum))
              Total Incomes : Rp. {{number_format($sum[0]->sum)}}
            @elseif(isset($sim))
              Total Expenses : Rp. {{number_format($sim[0]->sum)}}
            @endif
          </div>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover" id="example">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Amount</th>      
                    <th>Date</th>
                    <th>Receipt</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($rec as $data)
                    <tr style="background-color: @if($data->type == '+') lightgreen @else lightcoral @endif">
                        <td><i class="fa @if($data->type == '+') fa-plus @else fa-minus @endif" aria-hidden="true"></i></td>
                        <td>{{$data->judul_transaksi}}</td>
                        <td>Rp. {{number_format($data->jumlah)}}</td>
                        <!-- <td>@if($data->category) {{$data->category}} @else - @endif</td> -->
                        <td>{{date('d F Y', strtotime($data->tanggal))}}</td>
                        <td>@if($data->foto)
                            <button type="button" data-toggle="modal" data-target=".receiptModal" data-src="{{$data->foto}}" class="btn btn-sm btn-warning btn-fill">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            </button>
                            @else
                            <button type="button" data-toggle="modal" data-target=".receiptModal" data-src="{{$data->foto}}" class="btn btn-sm btn-danger btn-fill" disabled>
                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            </button>
                            @endif
                        </td>
                        <td>
                          @if(count($data->details))
                            <button type="button" data-toggle="modal" data-target="#detailModal{{$data->id}}" class="btn btn-sm btn-info btn-fill">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                            </button>
                            @else
                            <button type="button" data-toggle="modal" data-target="#detailModal{{$data->id}}" class="btn btn-sm btn-danger btn-fill" disabled>
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                            </button>
                            @endif
                        </td>
                        <td>
                          @if($data->type == '+') 
                          <a href="{{url('/income/update/'.$data->id)}}">
                            <button type="button" class="btn btn-sm btn-success btn-fill">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          @else 
                          <a href="{{url('/expense/update/'.$data->id)}}">
                            <button type="button" class="btn btn-sm btn-success btn-fill">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          @endif
                        </td>
                        <td>
                          <button type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{$data->id}}" class="btn btn-sm btn-danger btn-fill">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
    <div class="receiptModal modal fade" role="dialog">
      <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content" style="background-color: transparent; border: transparent;">
              <div class="modal-body photo-container">
                  <img class="photo" src="">
              </div>
          </div>
      </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-confirmation">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete Record <strong></strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this record? You can't recover it after deleted
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{url('/record/delete')}}">
              {{ csrf_field() }}
              <input type="hidden" name="id" id="ide">
              <button type="button" class="btn btn-primary btn-simple" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger btn-fill">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @foreach($rec as $data)
    <div class="modal fade" id="detailModal{{$data->id}}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Record Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                <thead>
                  <th>No.</th>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Prize</th>
                  <th>Subtotal</th>
                </thead>
                <tbody>
                  @php $i=1 @endphp
                  @foreach($data->details as $dota)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dota->nama_item}}</td>
                    <td>{{$dota->kuantitas}}</td>
                    <td>Rp. {{number_format($dota->harga)}}</td>
                    <td>Rp. {{number_format($dota->harga * $dota->kuantitas)}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Transaction Places : {{$data->tempat}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach
    
    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Start Bootstrap 2017. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

  </body>

  <script type="text/javascript">
    $('.receiptModal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) // Button that triggered the modal
      var recipient = a.data('src') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.photo').attr('src', recipient)
    })

    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var ide = button.data('id'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.modal-title').text('Delete Record ' + ide);
      modal.find('.modal-footer input#ide').val(ide);
    })
  </script>
</html>
