@extends('layouts.app')     
@section('content')
<div name="header">
   <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('URL List') }}&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" style="color:blue"><a class="btn btn-primary" href="{{ URL('/new_url') }}">Generate URL</a> </button>
   </h2>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="separator-breadcrumb border-top"></div>
@if(session('message'))
<div class="alert alert-success">{{ session('message')}} </div>
@endif
<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th width="15%">No</th>
                  <th width="15%">Name</th>
                  <th width="15%">Title</th>
                  <th width="15%">Short URL</th>
                  <th width="15%">URL</th>
                  <th width="15%">Created At</th>
               </tr>
            </thead>
            <tbody>
               @foreach($shortLinks as $key=>$val)
               <tr>
                  <td>{{$key+1}}</td>
                  <td>{{ucfirst($val->users->name)}}</td>
                  <td>{{ucfirst($val->title)}}</td>
                  <td class="url"><button class="short_url" style="color:red">{{$val->short_url}}</button></td>
                  <td>{{\Illuminate\Support\Str::limit($val->url, 50)}}</td>
                  <td>{!! date('d-M-Y', strtotime($val->created_at)) !!}</td>
               </tr>
            </tbody>
            @endforeach 
         </table>
      </div>
   </div>
</div>
<script type="text/javascript">
$(".short_url").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".url").text(); // Find the text
    navigator.clipboard.writeText($text);
    alert("Copied the text: " + $text);

});
</script>
@endsection