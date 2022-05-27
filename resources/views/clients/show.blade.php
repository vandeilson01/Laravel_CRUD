@extends('clients.layout')
   
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2>Vendo Cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row justify-content-center">
        <div class=" col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Nome:</strong>
                <p class="form-control">{{ $clients->name }}</p>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Email:</strong>
                <p class="form-control">{{ $clients->email }}</p>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Image:</strong>
                <p class="form-control"><img style="width:100px" src="{{ asset('uploads/'.$clients->image) }}"/></p>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Tipo(s) de Pessoa:</strong>
                @foreach($people as $peoplerow)
                    <p class="form-control">{{ $types->where('id', $peoplerow->type)->first()->people }}</p>
                @endforeach
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Telefone(s):</strong>
                @foreach($phone as $phonerow)
                    <p class="form-control">{{ $phonerow->number }}</p>
                @endforeach
            </div>
        </div>