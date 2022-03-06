@extends('backend.admin_master')
@section('main-content')

<div class="container-fluid justify-content-center">
    <div class="row">
        <div class="col-lg-12">
            <div class="card col-md-10">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Hi <strong class="badge badge-primary">{{ $employee -> name }}</strong></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Employee Name: <strong>{{ $employee -> name }}</strong></li>
                    <li class="list-group-item">Employee Email: <strong>{{ $employee -> email }}</strong></li>
                    <li class="list-group-item">Employee Phone: <strong>{{ $employee -> phone }}</strong></li>
                    <li class="list-group-item">Employee Desigation: <strong>{{ $employee -> designation }}</strong></li>
                    <li class="list-group-item">Employee Department: <strong>{{ $employee -> department }}</strong></li>
                    <li class="list-group-item">Employee Department: <strong>{{ $employee -> department }}</strong></li>

                    {{-- <li class="list-group-item">Employee Department: <strong>{{ $employee ->employeeEducation[instituation]  }}</strong></li> --}}
                </ul>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card col-md-10">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Experiences of <strong class="badge badge-primary">{{  $employee -> name }}</strong></h5>
                </div>

                @foreach ($all_experience as $data)
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item">Organization: <strong class="badge badge-success">{{ @$data ->  organization }}</strong></li>
                        <li class="list-group-item">From Date: <strong>{{ @$data ->  from_date }}</strong></li>
                        <li class="list-group-item">To Date: <strong>{{ @$data ->  to_date }}</strong></li>
                        <li class="list-group-item">Designation: <strong>{{ @$data -> designation }}</strong></li>
                        <li class="list-group-item">Duties: <strong>{{ @$data ->  duties }}</strong></li>
                    </ul>
                @endforeach


                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid justify-content-center mb-3">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card col-md-10">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Education of <strong class="badge badge-primary">{{  $employee -> name }}</strong></h5>
                </div>

                @foreach ($all_education as $data)
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item">Exam: <strong class="badge badge-success">{{ @$data -> exam }}</strong></li>
                        <li class="list-group-item">Passing Year: <strong>{{ @$data -> passing_year }}</strong></li>
                        <li class="list-group-item">Result: <strong>{{ @$data -> result }}</strong></li>
                        <li class="list-group-item">Instituation: <strong>{{ @$data ->  instituation }}</strong></li>
                    </ul>
                @endforeach


                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
