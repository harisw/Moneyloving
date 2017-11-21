<!DOCTYPE html>
<html>
<head>
	<title>Add new Income</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{('js/bootstrap.min.js')}}"></script>
</head>
<body>
	<form action="{{url('/income')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Transaksi</label>
	    <input type="text" class="form-control" name="income_name" aria-describedby="emailHelp" placeholder="Enter Transaction Name">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Jumlah</label>
	    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter income Value in Rp" name="income_val">
	  </div>
	<div class="form-group">
    	<label>Foto Transaksi</label><br>
        <input type="file" id="inputImg" name="income_img" class="form-control" placeholder="Enter Income Bill or note or etc...">
        <img id="preview"  class="img-responsive img-rounded" style="max-height: 400; max-width: 400;">
    </div>  	  

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

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
    </script>
</html>