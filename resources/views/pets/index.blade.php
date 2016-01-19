@extends('layouts.app')

@section('pet_styles')
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="js/vendor/jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" media="all" >
    <link rel="stylesheet" type="text/css" href="js/vendor/uploadify/uploadify.css" media="all" >
@endsection

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

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="">图片上传</label>

                        <div id="upload-wrap" style="margin-top:40px;display:none;">
                            <input type="file"  id="file" name="file" />
                            <span class="help-block">选择测试图片(1M以内)</span>
                            <p>
                                <a id="upload" class="btn btn-sm btn-success" style="display:none;" href="#">上传</a>
                            </p>

                            <br>
                            <div class="col-xs-12" id="ratio-wrap" style="margin-top:30px;display:none;">
                                <div id="ratio-input" class="input-group">
                                    <span class="input-group-addon">裁剪宽高比</span>
                                    <input type="text" id="ratio" class="form-control" placeholder="Ratio" value="1.33">
                                </div>
                                <span id="cut-help" class="help-block">输入宽高比进行裁剪初始化。例如1.33</span>
                                <p>
                                    <a id="cut" style="display:none;" class="btn btn-warning" href="#">确定裁剪区</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <label for="">裁剪区域</label>
                        <div class="row">
                            <div class="col-xs-12" id="uploaded-wrap" style="display:none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4" id="preview-wrap" style="display:none;">
                        <label for="">裁剪预览</label>
                        <div id="cut-preview-wrap">
                            <img id="cut-preview" src="" alt="">
                        </div>
                        <p>
                            <small id="log"></small>
                        </p>

                    </div>
                </div>

                <div class="row" id="cuted-wrap" style="display:none;">
                    <div class="col-xs-offset-2 col-xs-8 text-center">
                        <div class="page-header">
                            <h4>成品</h4>
                        </div>
                        <p>
                            <img id="image-cuted" src="" alt="">
                        </p>
                        <p>
                            <a id="download" style="display:none;" class="btn btn-block btn-danger" href="#">下载成品</a>
                        </p>

                    </div>
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
                                        <a href=" {{ url('pet/'.$pet->id) }} ">{{ $pet->name }}</a>
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

@section('pet_scripts')
    <!-- JavaScripts -->
    <script data-main="js/pets/main" type="text/javascript" src="js/vendor/jquery.imgareaselect-0.9.10/jquery.imgareaselect.min.js"></script>
    <script data-main="js/pets/main" type="text/javascript" src="js/vendor/uploadify/jquery.uploadify.min.js"></script>
    <script data-main="js/pets/main" type="text/javascript" src="js/pets/main.js"></script>
@endsection