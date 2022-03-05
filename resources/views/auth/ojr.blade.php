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
                    <th class="aosr-title">АОСР</th>
                    <th>Редактировать</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($data as $doc)
                    <tr>
                        <td>{{$doc->id}}</td>
                          <td>{{$doc->date_start}} / {{$doc->date_end}}</td>
                          <td class="aosr-name">{{$doc->title}}</td>
                          <td class="items-wrapper">
                              {{$doc->titleAosr}}
                              
                            @foreach ($aosr[$doc->id] as $item)
                              @if (json_decode($item->date)->projectName)
                              
                                <div class="items-wrapper__item" >
                                    <img src="http://94.228.115.45/assets/img/logo-file.svg" alt="АОСР">
                                    <a href="/personal/list/ojr/aosr/view/{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{json_decode($item->date)->projectName}}">{{ \Illuminate\Support\Str::limit(json_decode($item->date)->projectName, 30, $end='...') }}
                                     </a> &nbsp;<br>
                                </div>
                              @endif
                            @endforeach

                          </td>
                          <td class="d-flex justify-content-betwee">
                              <a href="/personal/list/ojr/create/{{$doc->id}}">
                                <button>Добавить АОСР</button>
                              </a>
                              {{-- <a href="/personal/list/edit/{{$doc->id}}">
                                <button>Изменить</button>
                              </a>
                              <a href="/personal/list/docs/{{$doc->id}}">
                                <button>Журнал работ</button>
                              </a>       --}}
                          </td>
                        </tr>
                    @endforeach
                  
                 
                </tbody>
              </table>
              <a href="/personal/list/ojr/add" class="">
                <input type="button" name="" class="action-button" value="Добавить работы">
            </a>
            </div>
          </main>
    </div>
</div>
@endsection