@extends('clients.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Voltar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opa!</strong> Ocorreram alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" value="{{ $client->email }}" placeholder="exemplo@email.com" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="form-control">
                        <p><img style="width:100px" src="{{ asset('uploads/'.$client->image) }}"/></p>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                <div class="form-group">
                    <strong>Tipo de pessoa:</strong>
                    @foreach($types as $type)
                    <div class="form-check form-check-inline">
                        <input {{ $typesclient->where('client', $client->id)->first()->type == $type->id ? 'checked' : '' }} class="form-check-input" type="checkbox" name="people[{{ $type->id }}]" id="inlineCheckbox{{ $type->id }}" value="{{ $type->id }}">
                        <label class="form-check-label" for="inlineCheckbox{{ $type->id }}">{{ $type->people }}</label>
                    </div>
                @endforeach
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                <div class="form-group">
                    <strong>Telefone(s):</strong>
                    @foreach($phone as $key => $value)
                        <input type="text" class="form-control mt-3" value="{{$value->number}}" name="number[$key]" id="number"  placeholder="(DDD) 9 1234-5678" data-id='new_{{$key+1}}'>
                    @endforeach
                    <div id="new_chq"></div>
                    <input type="hidden" value="{{$phoneend}}" id="total_chq">
    
                     <button class="btn btn-success mt-1" type="button" onclick="add()">Adicionar</button>
                    <button class="btn btn-danger mt-1" type="button" onclick="remove()">Remove</button>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  mt-3 text-center">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
   
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    function add(){
        var new_chq_no = parseInt($('#total_chq').val())+1;
        var new_input="<input type='text' class='form-control mt-2' name='number["+new_chq_no+"]'  placeholder='(DDD) 9 1234-5678' id='number' data-id='new_"+new_chq_no+"'>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no)
    }
    function remove(){
        var last_chq_no = $('#total_chq').val();
        if(last_chq_no>1){
            $('#number').attr('data-id','new_'+last_chq_no).remove();
            $('#total_chq').val(last_chq_no-1);
        }
    }
</script>
@endsection