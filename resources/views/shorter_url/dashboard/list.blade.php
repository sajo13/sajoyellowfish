@extends('layouts.app') @section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
<!-- ============ Body content start ============= -->
<div class="main-content">
<div class="breadcrumb">
<h1 class="mr-2">Overview</h1> </div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
<div class="col-lg-4 col-md-4 col-sm-4">
<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
<div class="card-body text-center">
<!-- <i class="i-Checkout-Basket"></i> -->
<div class="content">
<p class="text-muted mt-2 mb-0">Shortlink Count</p>
<p class="text-primary text-24 line-height-1 mb-2">{{$count}}</p>
</div>
</div>
</div>
</div>

</div>
<div class="row">
<div class="col-md-12">
<div class="card o-hidden mb-4">
<div class="card-header d-flex align-items-center">
<h3 class="w-50 float-left card-title m-0">Details</h3>
<div class="dropdown dropleft text-right w-50 float-right"> </div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table text-center" id="order_details" style="width:100%" aria-describedby="zero_configuration_table_info">
<thead>
<tr>
<th scope="col">SI</th>
<th scope="col">Name</th>
<th scope="col">Title </th>
<th scope="col">Short URL</th>
<th scope="col">URL</th>

</tr>
</thead>
<tbody>

@foreach($shortLinks as $key=>$val)
<tr role="row" class="odd">
<td>{{$key+1}}</td>
<td>{{ucfirst($val->users->name)}}</td>
<td>{{ucfirst($val->title)}}</td>
<td >{{$val->short_url}}</td>
<td>{{\Illuminate\Support\Str::limit($val->url, 50)}}</td>
</tr>
</tbody>
@endforeach 
</table>
</div>
</div>
</div>
</div>
<!-- end of col-->
</div>
<!-- end of row-->
<!-- end of main-content -->
</div>
<!-- Footer Start -->
<!-- fotter end -->
</div>
</div> @endsection @section('script')
<script src="{{ URL('public/js/admin/dashboardorder.js') }}"></script> @endsection