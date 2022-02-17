@extends('layouts.app')

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
            <h2>Общий журнал работ</h2>
            
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Дата</th>
                    <th>Название</th>
                    <th>Редактировать</th>
                  </tr>
                </thead>
                {{-- <tbody>
                    
                    @foreach ($Docs as $doc)
                    <tr>
                        <td>{{$doc->id}}</td>
                          <td>{{$doc->created_at}}</td>
                          <td>{{$doc->title}}</td>
                          <td class="d-flex justify-content-betwee">
                              <button>
                                  <a class="downLoad-list" href="/personal/list/download/{{$doc->id}}">Скачать</a>
                              </button>
                              <a href="/personal/list/show/{{$doc->id}}">
                                <button>Изменить</button>
                              </a>
                              <a href="/personal/list/docs/{{$doc->id}}">
                                <button>Журнал работ</button>
                              </a>
                              
                              <form action="/personal/list/deleted/" method="post">
                                {{ csrf_field() }}
                                <input name='id' type="hidden" value="{{$doc->id}}">
                                <button type="submit">Удалить</button>
                            </form>
                              
                          </td>
                        </tr>
                    @endforeach
                  
                 
                </tbody> --}}
              </table>
              <a href="/personal/list/ojr/" class="">
                <input type="button" name="" class="action-button" value="Добавить работы">
            </a>
            </div>
          </main>
    </div>
</div>
@endsection