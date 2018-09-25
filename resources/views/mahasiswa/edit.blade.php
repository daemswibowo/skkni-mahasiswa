@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Mahasiswa #{{ $mahasiswa->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/mahasiswa') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($mahasiswa, [
                            'method' => 'PATCH',
                            'url' => ['/mahasiswa', $mahasiswa->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('mahasiswa.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
