<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Products</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('admin.jsandcss')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.includes.header')
  @include('admin.includes.sidemenu')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <form action="{{URL::action('admin_controller@addproduct')}}" method="post">
            <div class="box-header with-border">
              <h3 class="box-title">Add a product</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-xs-4">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select class="form-control" name="brand" id="brand" required>
                        <option value="">zz</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input class="form-control" type="number" min="0" name="quantity" id="quantity" required>
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input class="form-control" type="number" min="0" name="price" id="price" required>
                    </div>
                    <div class="form-group">
                      <label>Available Color</label>
                      <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="white">White</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="black">Black</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="red">Red</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="blue">Blue</label>
                      </div>
                      <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="purple">Purple</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="silver">Silver</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="gld">Gold</label>
                        <label class="checkbox-inline"><input type="checkbox" name="color" value="pink">Pink</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group">
                      <label for="cpu">Cpu</label>
                      <input class="form-control" type="text" name="cpu" id="cpu" required>
                    </div>
                    <div class="form-group">
                      <label for="ram">Ram</label>
                      <input class="form-control" type="text" name="ram" id="ram" required>
                    </div>
                    <div class="form-group">
                      <label for="internal">Internal</label>
                      <input class="form-control" type="text" name="internal" id="internal" required>
                    </div>
                    <div class="form-group">
                      <label for="external">External</label>
                      <input class="form-control" type="text" name="external" id="external" required>
                    </div>
                    <div class="form-group">
                      <label for="camera">Camera</label>
                      <input class="form-control" type="text" name="camera" id="camera" required>
                    </div>
                    <div class="form-group">
                      <label for="battery">Battery</label>
                      <input class="form-control" type="text" name="battery" id="battery" required>
                    </div>
                    <div class="form-group">
                      <label for="sim">Sim</label>
                      <input class="form-control" type="text" name="sim" id="sim" required>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group">
                      <img id="output" style="width:90%; height:80%" class="thumbnail">
								      <div class="col-md-12 col-xs-12 col-lg-12">
									      <label>Product Image:</label>
									      <input type="file" name="avatar" accept="image/*" onchange="loadFile(event)" required>
								      </div>
							      </div>
                  </div>
                </div>
            </div>
            <div class="box-footer">
              <div class="form-group pull-left">
                <input class="btn btn-warning" type="reset" value="reset">
              </div>
              <div class="form-group pull-right">
                <input class="btn btn-info" type="submit" value="Submit">
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">All Products</h3>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Image</th>
              <th>Color</th>
              <th>Specs</th>
              <th>Description</th>
              <th>Quantity In Stock</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>0</td>
              <td>Name dummy
              </td>
              <td>Dumy</td>
              <td> 4</td>
              <td>X</td>
              <td>test</td>
              <td>dummy</td>
              <td>xx</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Image</th>
              <th>Color</th>
              <th>Specs</th>
              <th>Description</th>
              <th>Quantity In Stock</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>
  </div>
  @include('admin.includes.footer')
</div>
<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#table').DataTable()
  })
</script>
<script>
		  var loadFile = function(event) {
		    var output = document.getElementById('output');
		    output.src = URL.createObjectURL(event.target.files[0]);
		  };
		</script>
</body>
</html>
