@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Mahasiswa</div>
                    <div class="card-body">
                        <a href="{{ url('/mahasiswa') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::open(['url' => '/mahasiswa', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('mahasiswa.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
