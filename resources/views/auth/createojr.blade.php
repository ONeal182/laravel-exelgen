@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
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
                <h2>Новый ОЖР</h2>

                <div class="table-responsive">
                    <form class="form-ojr" action="/personal/list/ojr/add/save" id="msform">
                        <input type="hidden" name="idOjr" value="{{$ojr->id}}">
                        <div class="form-group row">
                            <label for="actNumber" class="col-sm-2 col-form-label">Акт №</label>
                            <div class="col-sm-10">
                                <input name="actNumber" type="text" class="form-control" id="actNumber" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateStart" class="col-sm-2 col-form-label">от</label>
                            <div class="col-sm-10">
                                <input name="dateStart" type="date" class="form-control" id="dateStart" value=""
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="doneWork" class="col-sm-2 col-form-label">Выполненые работы</label>
                            <div class="col-sm-10">
                                <select class="form-control doneWork" id="doneWork" name="doneWork">
                                    <option value=""></option>
                                    @foreach ($arrDate as $date)
                                        <option value="{{ $date->id }}">{{ $date->projectName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workName" class="col-sm-2 col-form-label">Наименование работ</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $ojr->title }}" name="nameWork" class="form-control"
                                    id="dateGo" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateGo" class="col-sm-2 col-form-label">Даты проведения работ</label>
                            <div class="col-sm-10">
                                c<input type="date" value="{{ $ojr->date_start }}" name="dateBeginWork"
                                    class="form-control" id="dateGo" placeholder="">
                                по<input type="date" value="{{ $ojr->date_end }}" name="dateEndWork" class="form-control"
                                    id="dateGo" placeholder="">
                            </div>

                        </div>
                        <fieldset style="background: none;">

                            <div class="form-group row ">
                                <label for="docsAcept" class="col-sm-2 col-form-label">Документы, подтверждающие
                                    соответствие
                                    работ предъявленным к ним требованиям </label>
                                <div class="forms row_sections col-10">

                                    <div class="add_section first_section">
                                        <div class="content_section">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <input type="text" name="doc[]" placeholder="Документ">
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" data-name="docDate" class="date"
                                                        readonly="readonly" name="docDate[]" placeholder="01.01.2000" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control_section topnull">
                                            <div class="delete"></div>
                                            <div class="add" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <div class="add_section">
                                        <div class="content_section">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <input type="text" disabled="disabled" placeholder="Документ">
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" disabled="disabled" data-name="docDateEmpty"
                                                        class="date" readonly="readonly"
                                                        placeholder="01.01.2000" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control_section">
                                            <div class="delete" style="display: none;"></div>
                                            <div class="add"></div>
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="col-lg-7">
                                      <input type="text" name="doc[]" placeholder="Документ">
                                    </div>
                                    <div class="col-lg-3 d-flex align-items-start">
                                      <input type="text" style="width:80%;" data-name="docDate" class="date readonly="readonly" name="docDate[]" placeholder="01.01.2000">
                                      <div class="control_section topnull" style="width:20%;">
                                        <div class="delete"></div>
                                        <div class="add" style="display: none;"></div>
                                      </div>
                                    </div>

                                        <div class="col-lg-7">
                                          <input type="text" style="width:80%;" disabled="disabled" placeholder="Документ">
                                        </div>
                                        <div class="col-lg-3 align-items-start">
                                          <input type="text" style="width:20%;" disabled="disabled" data-name="docDateEmpty" class="date" readonly="readonly" placeholder="01.01.2000">
                                        </div> --}}




                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="nameWorkCostruct" class="col-sm-2 col-form-label">Разрешается производство последующих
                                работ</label>
                            <div class="col-sm-10">
                                <input type="text" name="nameWorkCostruct" class="form-control" id="nameWorkCostruct"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="moreInfo" class="col-sm-2 col-form-label">Дополнительные сведения </label>
                            <div class="col-sm-10">
                                <input type="text" name="moreInfo" class="form-control" id="moreInfo"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="countAOSR" class="col-sm-2 col-form-label">Количество экземпляров</label>
                            <div class="col-sm-10">
                                <input type="number" name="countAOSR" class="form-control" id="countAOSR"
                                    placeholder="">
                            </div>
                        </div>
                        <fieldset style="display:block;background:none;">
                        <div class="form-group row d-flex">
                            <label for="application" class="col-sm-2 col-form-label">Приложения</label>
                            <div class="forms col-10">

                                <div class="add_section first_section">
                                  <div class="content_section">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <input type="text" name="countSuppl[]" placeholder="Приложение">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="control_section topnull">
                                    <div class="delete"></div>
                                    <div class="add" style="display: none;"></div>
                                  </div>
                                </div>
                                <div class="add_section">
                                  <div class="content_section">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <input type="text" name="countSuppl2" placeholder="Приложение">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="control_section">
                                    <div class="delete" style="display: none;"></div>
                                    <div class="add"></div>
                                  </div>
                                </div>
                    
                              </div>
                        </div>
                    </fieldset>
                        <div class="form-group row">
                            <label for="application2" class="col-sm-2 col-form-label">Дополнительные
                                Приложения </label>
                            <div class="col-sm-10">
                                <input type="text" name="application2" class="form-control" id="application2"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representativeBuilderFIO" class="col-sm-2 col-form-label">Представитель застройщика</label>
                            <div class="col-sm-10">
                                <input  type="text" name="representativeBuilderFIO" class="form-control" id="representativeBuilderFIO"
                                    placeholder="Фамилия, инициалы">
                                    <input  type="text" name="representativeBuilderPosition" class="form-control" id="representativeBuilderPosition"
                                    placeholder="Должность">
                                    <input  type="text" name="representativeBuilderId" class="form-control" id="representativeBuilderId"
                                    placeholder="Должность">
                                    <input  type="date" name="representativeBuilderDateGet" class="form-control" id="representativeBuilderDateGet"
                                    placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres2" class="col-sm-2 col-form-label">Представитель лица, осуществляющегоПредставитель лица, осуществляющего
                                строительство, по вопросам строительного контроля</label>
                            <div class="col-sm-10">
                                <input  type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO"
                                    placeholder="Фамилия, инициалы">
                                    <input  type="text" name="memberBuilderPosition" class="form-control" id="memberBuilderPosition"
                                    placeholder="Должность">
                                    <input  type="text" name="memberBuilderId" class="form-control" id="memberBuilderId"
                                    placeholder="Идентификационный номер">
                                    <input  type="date" name="memberBuilderDateId" class="form-control" id="memberBuilderDateId"
                                    placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres3" class="col-sm-2 col-form-label">Представитель лица, осуществляющего строительство </label>
                            <div class="col-sm-10">
                                <input  type="text" name="contractorName" class="form-control" id="workerPres3"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres4" class="col-sm-2 col-form-label">Представитель лица, осуществляющего подготовку проектной документации</label>
                            <div class="col-sm-10">
                                <input  type="text" name="workerPres4" class="form-control" id="workerPres4"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres5" class="col-sm-2 col-form-label">Представитель лица, выполнившего работы, подлежащие освидетельствованию</label>
                            <div class="col-sm-10">
                                <input  type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO"
                                    placeholder="Фамилия, инициалы">
                                    <input  type="text" name="memberBuilderPosition" class="form-control" id="memberBuilderPosition"
                                    placeholder="Должность">
                                    <input  type="text" name="memberBuilderId" class="form-control" id="memberBuilderId"
                                    placeholder="Идентификационный номер">
                                    <input  type="date" name="memberBuilderDateId" class="form-control" id="memberBuilderDateId"
                                    placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres5" class="col-sm-2 col-form-label">Представители иных лиц</label>
                            <div class="col-sm-10">
                                <input  type="text" name="anotherFIO[]" class="form-control" id="anotherFIO[]"
                                    placeholder=" 
                                    Фамилия, инициалы">
                                    <input  type="text" name="anotherPosition[]" class="form-control" id="anotherFIO[]"
                                    placeholder="Должность">
                                    <input  type="text" name="anotherREQ[]" class="form-control" id="anotherREQ[]"
                                    placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                                    <input  type="date" name="anotherDate_Id[]" class="form-control" id="aanotherDate_Id[]"
                                    placeholder="Даты выдачи документа">

                            </div>
                        </div>
                        <input  type="submit" name="" class="action-button" value="Сохранить">
                    </form>
   
                        

                    
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!-- Popperjs -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <!-- datepicker -->
    <script type="text/javascript" src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/i18n/datepicker.ru-RU.js') }}"></script>
    <!-- Script -->
    <script type="text/javascript" src="{{ asset('assets/js/rule-date.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/ajax.js') }}"></script>
@endsection
