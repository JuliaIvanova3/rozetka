@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
        <catalog-component></catalog-component>
    </div>
    <div class="col-md-8">
        <carousel-component> </carousel-component>
    </div>
    
    <div class="col-md-12">
        <br/><br/>
        <card-component></card-component>
    </div>
    <div class="col-md-12">
        <footer-component></footer-component>
    </div>
  </div>
</div>

   

@endsection
