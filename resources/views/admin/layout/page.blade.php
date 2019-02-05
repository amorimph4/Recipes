@extends('admin.layout.master')

@section('content-master')
    <div class="page-wrapper">
        <nav class="navbar navbar-fixed-top" style=" background-color: #010102">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Receitas</a>

                        
                </div>
                
                <div class="pull-right" style="margin-top: 15px;">
                    <a href="{{ route('logout') }}" class="pull-right btn btn-default" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session('message')['type'] }}">
                            {{ session()->get('message')['content'] }}
                        </div>
                    @endif
                    @if ($errors->any())
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i> Ocorreu um problema ao processar a solicitação.
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
