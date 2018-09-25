@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mahasiswa {{ $mahasiswa->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/mahasiswa') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mahasiswa/' . $mahasiswa->id . '/edit') }}" title="Edit Mahasiswa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['mahasiswa', $mahasiswa->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Mahasiswa',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $mahasiswa->id }}</td>
                                    </tr>
                                    <tr><th> Nim </th><td> {{ $mahasiswa->nim }} </td></tr><tr><th> Name </th><td> {{ $mahasiswa->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
