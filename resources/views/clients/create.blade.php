@extends('clients.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Novo Cliente</h2>
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
   
<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="exemplo@email.com" required>
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Tipo de pessoa:</strong>
                @foreach($types as $type)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="people[{{ $type->id }}]" id="inlineCheckbox{{ $type->people }}" value="{{ $type->id }}">
                        <label class="form-check-label" for="inlineCheckbox{{ $type->people }}">{{ $type->people }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Telefone(s):</strong>
                <input type="text" class="form-control mt-1" name="number[1]" id="number" placeholder="(DDD) 9 1234-5678">
                <div id="new_chq"></div>
                <input type="hidden" value="1" id="total_chq">

                <button class="btn btn-success mt-1" type="button" onclick="add()">Adicionar</button>
                <button class="btn btn-danger mt-1" type="button" onclick="remove()">Remove</button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center  mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
   
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add(){
    var new_chq_no = parseInt($('#total_chq').val())+1;
    var new_input="<input type='text' class='form-control mt-2' name='number["+new_chq_no+"]'  placeholder='(DDD) 9 1234-5678' id='new_"+new_chq_no+"'>";
    $('#new_chq').append(new_input);
    $('#total_chq').val(new_chq_no)
    }
    function remove(){
    var last_chq_no = $('#total_chq').val();
    if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
    }
    }
</script>
@endsection