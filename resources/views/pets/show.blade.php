@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

@if (count($pet) > 0)
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <h2>{{ $pet->name }}</h2>

    <!-- New Record Form -->
    <form action="{{ url('record/'.$pet->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Record Content -->
        <div class="form-group">
            <label for="record-content" class="col-sm-3 control-label">新增记录</label>

            <div class="col-sm-6">
                <textarea name="content" id="record-content" class="form-control"></textarea>
            </div>
        </div>

        <!-- Add Record Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> 增加记录
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Current Pets -->
@if (count($records) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        现在记录
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
            <th>记录</th>
            <th>&nbsp;</th>
            </thead>

            <!-- Table Body -->
            <tbody>
            @foreach ($records as $record)
            <tr>
                <!-- record content -->
                <td class="table-text">
                    <div>{{ $record->content }}</div>
                </td>

                <td>
                    <form action="{{ url('record/'.$record->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button>删除记录</button>
                    </form>
                </td>


            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endif
@endsection