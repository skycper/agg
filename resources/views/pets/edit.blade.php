@extends('layouts.app')

@section('content')

<form action="{{ url('pet/'.$pet->id) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <!-- Pet Name -->
    <div class="form-group">
        <label for="pet-name" class="col-sm-3 control-label">乌龟</label>

        <div class="col-sm-6">
            <input type="text" name="name" id="pet-name" class="form-control" value={{$pet->name}}>
        </div>
    </div>

    <!-- Add Pet Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-edit"></i> 修改乌龟
            </button>
        </div>
    </div>
</form>

@endsection
