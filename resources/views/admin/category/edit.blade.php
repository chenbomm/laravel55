@extends('comment.admin_base')

@section('title','管理后台-商品分类修改')

<!--页面顶部信息-->
@section('pageHeader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 商品分类修改 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('msg') }}
        </div>
    @endif
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="error_msg"></span>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">分类修改表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

            <form class="form-horizontal form-bordered" action="/admin/category/doEdit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$info->id}}">
                <div class="form-group">
                    <label class="col-sm-3 control-label">分类名字</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="f_id">
                            <option value="0">顶级分类</option>
                            @if(!empty($list))
                                @foreach($list as $k => $cate)
                                    <option value="{{$cate['id']}}" @if($info->f_id == $cate['id']) selected @endif>{{str_repeat('--',$cate['level'])." ".$cate['cate_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">分类名字</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="分类名字" class="form-control" name="cate_name" value="{{$info->cate_name}}" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">是否可用</label>
                    <div class="col-sm-6">
                        <div class="radio"><label><input type="radio" name="status" value="1" @if($info->status == 1) checked  @endif> 可用</label></div>
                        <div class="radio"><label><input type="radio" name="status" value="2" @if($info->status == 2 )checked @endif>禁用</label></div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">修改分类</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->

        <script type="text/javascript">

            $(".alert-danger").hide();

            $("#btn-save").click(function(){

                var brand_name = $("input[name=cate_name]").val();

                if(brand_name == ''){
                    $("#error_msg").text('品牌名称不能为空');
                    $(".alert-danger").toggle();
                    return false;
                }

            });

        </script>

@endsection