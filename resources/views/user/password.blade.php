@extends('user.layout')
@section('content')

    <h1 class="page-header">Cập nhật mật khẩu</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <div class="form-group" style="position: relative">
                    <label for="pwd">Mật khẩu cũ:</label>
                    <input type="password" class="form-control" name="password_old" placeholder="*********" value="">
                    <a style="position: absolute; top: 32px; right: 10px; color: #0c1923" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    @if($errors->has('password_old'))
                        <span class="error-text">
                        {{$errors->first('password_old')}}
                    </span>
                    @endif
                </div>
                <div class="form-group" style="position: relative">
                    <label for="pwd">Mật khẩu mới:</label>
                    <input type="password" class="form-control" name="password" placeholder="*********" value="">
                    <a style="position: absolute; top: 32px; right: 10px; color: #0c1923" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                </div>
                @if($errors->has('password'))
                    <span class="error-text">
                        {{$errors->first('password')}}
                    </span>
                @endif
                <div class="form-group" style="position: relative">
                    <label for="pwd">Nhập lại mật khẩu mới:</label>
                    <input type="password" class="form-control" name="password_confirm" placeholder="*********" value="">
                    <a style="position: absolute; top: 32px; right: 10px; color: #0c1923" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                    @if($errors->has('password_confirm'))
                        <span class="error-text">
                        {{$errors->first('password_confirm')}}
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Cập nhật</button>
            </form>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $(".form-group a").click(function () {
                let $this = $(this);

                if($this.hasClass('active'))
                {
                    $this.parents('.form-group').find('input').attr('type','password')
                    $this.removeClass('active');
                }else
                {
                    $this.parents('.form-group').find('input').attr('type','text')
                    $this.addClass('active');
                }
            });
        });
    </script>
@stop