@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('heading', 'Dashboard')



@section('contents')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
      <i class="fas fa-user-tie"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Customer</h4>
        </div>
        <div class="card-body">
          44
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
      <i class="far fa-check-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Active in Challenge</h4>
        </div>
        <div class="card-body">
          44
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
      <i class="far fa-times-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Rules Violation</h4>
        </div>
        <div class="card-body">
          55
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
      <i class="fas fa-money-check-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Withdrawable Profit</h4>
        </div>
        <div class="card-body">
          66
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
