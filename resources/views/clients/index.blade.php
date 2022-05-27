@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-10 mt-3 mb-4">
            <div class="pull-left">
                <h2>Simples CRUD</h2>
            </div>
        </div>
        <div class="col-lg-2 mt-3 mb-4">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}">Novo Cliente</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-2">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo de Pessoa</th>
            <th>Telefone</th>
            <th>Image</th>
            <th width="280px">Ações</th>
        </tr>
        <tr>
      
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>
            @php 
                $peoples = $clients->where('id', $client->id)->first();
                $people = $peoples->type()->get();
            @endphp
            @foreach($people as $peoplerow)
                    {{  $types->where('id', $peoplerow->type)->first()->people }}<br/>
            @endforeach
            </td>
            <td>
            @php 
                $phones = $clients->where('id', $client->id)->first();
                $phone = $phones->phone()->get();
            @endphp
            @foreach($phone as $phonerow)
                    {{  $phonerow->number }}<br/>
            @endforeach
            </td>
            <td><img style="width:100px" src="{{ asset('uploads/'.$client->image) }}"/></td>
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $clients->links() !!}
      
@endsection