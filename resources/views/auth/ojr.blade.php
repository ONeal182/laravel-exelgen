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
                <div class=" table-header">
                    <h2>Общий журнал работ</h2>

                    <a href="/personal/list/ojr/add" class="">
                        <input type="button" name="" class="action-button btn btn-outline-primary white-bg white-bg"
                            value="Добавить работы">
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Дата</th>
                                <th>Название</th>
                                <th class="aosr-title">АОСР</th>
                                <th style="width:160px;">Редактировать</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $doc)
                                <tr>
                                    <td>{{ $doc->id }}</td>
                                    <td class="aosr-date col-3">{{ date('d-m-Y', strtotime($doc->date_start))  }} / {{ date('d-m-Y', strtotime($doc->date_end)) }}</td>
                                    <td class="aosr-name col-5">{{ $doc->title }}</td>
                                    <td>
                                        <div class="items-wrapper">
                                            {{ $doc->titleAosr }}
                                            
                                            @foreach ($aosr[$doc->id] as $item)
                                                @if (json_decode($item->date)->projectName)
                                                    <div class="items-wrapper__item">
                                                        <img src="http://94.228.115.45/assets/img/logo-file.svg" alt="АОСР">
                                                        <a href="/personal/list/ojr/aosr/view/{{ $item->id }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ json_decode($item->date)->projectName }}">{{ \Illuminate\Support\Str::limit(json_decode($item->date)->projectName, 25, $end = '...') }}
                                                        </a> &nbsp;<br>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                    </td>
                                    <td class="justify-content-betwee btn-wrapper">
                                        <a href="/personal/list/ojr/create/{{ $doc->id }}">
                                            <button type="button" class="btn btn-outline-primary white-bg">Добавить
                                                АОСР</button>
                                        </a>
                                        <a href="/personal/list/ojr/edit/{{ $doc->id }}">
                                            <button type="button"
                                                class="btn btn-outline-primary white-bg">Редактировать</button>
                                        </a>
                                        @if ($doc->id_aosr == '')
                                        <a href="/personal/list/ojr/deleted/{{ $doc->id }}">
                                          <button type="button" class="btn btn-outline-primary white-bg">Удалить</button>
                                      </a>
                                        @endif
                                        
                                        {{-- <a href="/personal/list/edit/{{$doc->id}}">
                <button type="button" class="btn btn-outline-primary white-bg">Изменить</button>
                </a>
                <a href="/personal/list/docs/{{$doc->id}}">
                  <button type="button" class="btn btn-outline-primary white-bg">Журнал работ</button>
                </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="btn-action-wrapper">
                        <a href="/personal/list/ojr/add" class="">
                            <input type="button" name="" class="action-button btn btn-outline-primary white-bg"
                                value="Добавить работы">
                        </a>
                    </div>

                </div>
            </main>
        </div>
    </div>
@endsection
