@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Maestros</h3>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12  mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('clientes') }}">
                            <i class="fa fa-user"></i><br>
                            <span> Clientes</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12  mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('supervisores') }}">
                            <i class="fa fa-users"></i><br>
                            <span> Supervisores</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12  mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('ingenios') }}">
                            <i class="fa fa-flask" aria-hidden="true"></i><br>
                            <span> Ingenios</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('tarifarios') }}">
                            <i class="far fa-calendar-alt"></i><br>
                            <span> Tarifarios</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('lineasprod') }}">
                            <i class="fas fa-shopping-basket"></i><br>
                            <span> Lineas de Productos</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('metpagos') }}">
                            <i class="fas fa-money-check-alt"></i><br>
                            <span> Modos de Pago</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('estpagos') }}">
                            <i class="fab fa-bitcoin"></i><br>
                            <span> Estados de Pago</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('tiposserv') }}">
                            <i class="fas fa-hand-holding-heart"></i><br>
                            <span> Tipos de Servicios</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="{{ route('designaciones') }}">
                            <i class="far fa-calendar-alt"></i><br>
                            <span> Designaciones</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection