<!DOCTYPE html>
<html>
<head>
	<title>Update Income</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

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
	<div class="container">
		<div class="col-md-8">
		
	<form action="{{url('/income/update')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
    <input type="hidden" name="id" value="{{$inc->id}}" id="recordID">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Transaksi</label>
	    <input type="text" class="form-control" name="income_name" aria-describedby="emailHelp" value="{{$inc->judul_transaksi}}" placeholder="Enter Transaction Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Tempat Transaksi</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$inc->tempat}}" placeholder="Enter Transaction Place" name="income_place">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Tanggal Transaksi</label>
	    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter transaction date" name="income_date">
	  </div>
	<div class="form-group">
    	<label>Foto Transaksi</label><br>
        <input type="file" id="inputImg" name="income_img" class="form-control" placeholder="Enter Income Bill or note or etc...">
        <img id="preview"  class="img-responsive img-rounded" >
    </div>
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="detailCheck" name="detailCheck" value="true">
      Edit Income Details
    </label>
  	</div>
    @php $i = 0; @endphp
  	<hr class="big">
  	<div class="row col-md-12" id="exist_detail" style="display: none;">
      @foreach($inc->details as $data)
      @php $i++; @endphp
  		<div class="form-container itemDetailContainer" style="margin-left: 15px;">
	  		<div class="form-group">
		    <label for="exampleInputEmail1">Item Name</label>
		    <input type="text" class="form-control" name="item_name_{{$i}}" aria-describedby="emailHelp" value="{{$data->nama_item}}" placeholder="Enter Item Name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Quantity</label>
		    <input type="text" class="form-control" name="item_qty_{{$i}}" aria-describedby="emailHelp" value="{{$data->kuantitas}}" placeholder="Enter Item Quantity">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Unit Price</label>
		    <input type="text" class="form-control" name="item_price_{{$i}}" aria-describedby="emailHelp" value="{{$data->harga}}" placeholder="Enter Item Price">
		  </div>
  		</div>
      @endforeach
  	</div>
  	<input type="hidden" name="item_num" value="{{$i}}" id="itemNum">
  	<button class="btn btn-success" type="button" id="addDetailBtn">Tambahkan Item</button>

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	</div>
</body>
<script type="text/javascript">
    document.getElementById('inputImg').onchange = function previewImg(input) {
            var reader = new FileReader();
            reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    }
    $("#detailCheck").change(function(){
    	var status = $("#detailCheck").prop("checked");
    	if(status)
    		$("#exist_detail").show();
    	else
    		$("#exist_detail").hide();
    });
    document.getElementById("addDetailBtn").addEventListener("click", function(){
    	var count = document.getElementById("itemNum").value;
    	count++;
    	$("#exist_detail").append(`<div class="form-container itemDetailContainer" style="margin-left: 15px;">
	  		<div class="form-group">
		    <label for="exampleInputEmail1">Item Name</label>
		    <input type="text" class="form-control" name="item_name_`+count+`" aria-describedby="emailHelp" placeholder="Enter Item Name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Quantity</label>
		    <input type="text" class="form-control" name="item_qty_`+count+`" aria-describedby="emailHelp" placeholder="Enter Item Quantity">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Unit Price</label>
		    <input type="text" class="form-control" name="item_price_`+count+`" aria-describedby="emailHelp" placeholder="Enter Item Price">
		  </div>
  		</div>`);
  		document.getElementById("itemNum").value = count;
    });
    </script>
</html>