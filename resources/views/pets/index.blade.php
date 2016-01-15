@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
         @include('common.errors')


        <!-- New Pet Form -->
        <form action="{{ url('pet') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Pet Name -->
            <div class="form-group">
                <label for="pet-name" class="col-sm-3 control-label">乌龟</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="pet-name" class="form-control">
                </div>
            </div>

            <!-- Add Pet Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> 增加乌龟
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Pets -->
        @if (count($pets) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    现在乌龟
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>乌龟</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($pets as $pet)
                                <tr>
                                    <!-- Pet Name -->
                                    <td class="table-text">
                                        <div>{{ $pet->name }}</div>
                                    </td>

                                    <td>
                                       <form action="{{ url('pet/'.$pet->id) }}" method="POST">
                                                   {{ csrf_field() }}
                                                   {{ method_field('DELETE') }}

                                                   <button>删除乌龟</button>
                                         </form>
                                    </td>

                                    <td>
                                           <a href="{{ url('pet/'.$pet->id.'/edit') }}" >
                                                            <button>修改乌龟</button>
                                             </a>
                                      </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
@endsection