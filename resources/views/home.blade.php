@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">站点管理页面</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        管理页面正在建设中，如要对文章的管理，使用页面中的操作按钮即可
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
