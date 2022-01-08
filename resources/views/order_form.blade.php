<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- DataTables -->
  
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <div class="card">
    
    <div class="card-body">
      @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
      <a href="/" class=""><h3>Order Form</h3></a> <div class="row">
     
      <div class="col-12 ">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Order Form</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
              </li>        
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <form method="GET" class="form-group">
                <input type="text" name="search" placeholder="Enter Meal">
                <label for="">Search</label>
              </form>
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <form action="{{route('order.submit')}}" method="post">
                  @csrf
                  <div class="row">
                  @foreach($dishes as $dish)
                      <div class="col-sm-3">
                          <div class="card">
                          <div class="card-body">
                          <img src="{{url('/images/'.$dish->image)}}" width=100 height=100><br>
                          <label for="">{{$dish->name}}</label><br>
                          <input type="number" name="{{$dish->id}}"><br>
                          </div>
                          </div>
                      </div>
                  @endforeach
                  </div>
                  <div class="form-group">
                    <select name="table">
                      @foreach ($tables as $table)
                      <option class="form-control"
                      value="{{$table->id}}">{{$table->number}}</option>
                      @endforeach
                    </select>
                  </div>
                  <input type="submit" class="btn btn-success">
                </form>
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Dish Name</th>
                      <th>Table Number</th>
                      <th>Status</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($orders as $order)
                      <tr>
                        <td>{{$order->dish->name}}</td>
                        <td>{{$order->table_id}}</td>
                        <td>{{$status[$order->status]}}</td>
                        <td>
                            <a href="/order/{{$order->id}}/serve" class="btn btn-success">Serve</a>
                        </td>
                      </tr>
                  @endforeach
                  </tbody>
                  </table>
              </div>
              
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div></div></div>
  </div>
  
       
  
      <script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>