@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Configuraci&oacute;n</h3>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12  mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="">
                            <i class="fa fa-user"></i><br>
                            <span> Usuarios</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12  mb-3">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="">
                            <i class="fa fa-users"></i><br>
                            <span> Roles</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection