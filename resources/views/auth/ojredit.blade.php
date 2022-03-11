@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
@section('content')
    @if (session('status'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">

                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                {{-- <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/personal">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/personal/settings">
                            <span data-feather="settings"></span>
                            Settings
                        </a>
                    </li>
            </div> --}}
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 head_admin-list">
                <h2>Новая работа</h2>

                <div class="table-responsive">
                    <form action="/personal/list/ojr/edit/save/{{$ojr->id}}" method="get" class="form-ojr">
                        @csrf
                        <div class="form-group" style="margin-left: -15px;">
                            <label for="nameOjr" class="col-sm-3 col-lg-8 col-form-label">Название работы</label>
                            <div class="col-sm-8 col-lg-7">
                                <input  name="nameOjr" value="{{$ojr->title}}" type="text" required class="form-control" id="nameOjr" placeholder="">
                            </div>
                            
                        </div>
                        <div class="form-group" style="margin-left: -15px;">
                            <label for="nameOjr" class="col-sm-3 col-lg-8 col-form-label">Дата начала работ</label>
                            <div class="col-sm-8 col-lg-7">
                                <input  name="date_start_ojr" value="{{$ojr->date_start}}" type="date" required class="form-control" id="nameOjr" placeholder="">
                            </div>

                        </div>
                        <div class="form-group" style="margin-left: -15px;">
                            <label for="nameOjr" class="col-sm-3 col-lg-8 col-form-label">Дата окончания работ</label>
                            <div class="col-sm-8 col-lg-7">
                                <input  name="date_end_ojr" value="{{$ojr->date_end}}" type="date" required class="form-control" id="nameOjr" placeholder="">
                            </div>

                        </div>
                        <div class="form-group" style="margin-left: -15px;">
                        <div class="col-sm-8 col-lg-6">
                            <input type="submit" name="" class="action-button" value="Сохранить">
                        </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
