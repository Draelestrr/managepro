<!-- resources/views/dashboard.blade.php -->
@extends('layouts.layout')

@section('title', 'Dashboard - ManagePro')

@section('breadcrumb-title', 'Dashboard')
@section('breadcrumb-heading', 'Dashboard')

@section('content')

<h1 class="font-weight-bolder mb-0">@yield('breadcrumb-heading', 'Dashboard')</h1>
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">ACA IRAN GRAFICOS, PENDIENTE</p>
              
            </div>
            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">attach_money</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-2 ps-3">
          <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+15% </span>que la semana pasada</p>
        </div>
      </div>
    </div>
    <!-- Más tarjetas aquí -->
  </div>
@endsection
