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
    </div>
</div>

<section class="admin-form">
    <div class="container">
        <div class="row">
            <div>
                <a href="/personal/list/ojr/"><-Назад</a>
            </div>
            <h2 class="col-md-12">Новый АОСР</h2>
            <form class="col-12"  action="/personal/list/ojr/add/save" >
                <input type="hidden" name="idOjr" value="{{$ojr->id}}">
                <div>
                    <label for="numberAct" class="col-form-label">Акт №</label>

                    <input name="numberAct" type="text" class="form-control" id="numberAct" placeholder="">
                </div>
                <div>
                    <label for="dateAOSR" class="col-form-label">от</label>

                    <input name="dateAOSR" value="{{$ojr->date_start}}" type="date" class="form-control" id="dateAOSR" value="" placeholder="">
                </div>
                <div>
                    <label for="doneWork" class=" col-form-label">Копия АОСР</label>

                    <select multiple class="form-control doneWork" id="doneWork" name="doneWork">
                        
                        @foreach ($arrDate as $date)
                        <option value="{{ $date->id }}">{{ $date->projectName }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="ojrWork" class=" col-form-label">Выполненые работы</label>

                    <select multiple class="form-control ojrWork" id="ojrWork" name="orjWork">
                        
                        @foreach ($ojrAll as $date)
                        <option value="{{ $date->id }}">{{ $date->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="workName" class="col-form-label">Наименование работ</label>

                    <input type="text" value="{{$ojr->title}}" name="projectName" class="form-control" id="projectName" placeholder="">
                </div>
                <div>
                    <label for="dateGo" class=" col-form-label">Даты проведения работ</label>

                    <p class="form-label-p">c</p>

                    <input type="date" value="{{ $ojr->date_start }}" name="dateBeginWork" class="form-control" id="dateGo" placeholder="">

                    <p class="form-label-p">по</p>

                    <input type="date" value="{{ $ojr->date_end }}" name="dateEndWork" class="form-control" id="dateGo" placeholder="">
                </div>

                <fieldset style="background: none;">

                    <div class="form-group row ">
                        <label for="docsAcept" class="col-form-label fieldset-label col-12">Документы, подтверждающие
                            соответствие
                            работ предъявленным к ним требованиям </label>
                        <div class="forms row_sections col-12">

                            <div class="add_section first_section">
                                <div class="content_section">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="text" name="doc[]" class="form-control" placeholder="Документ">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" data-name="docDate" class="date form-control" readonly="readonly" name="docDate[]" placeholder="01.01.2000" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control_section topnull">
                                    <div class="delete"></div>
                                    <div class="add" style="display: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="add_section">
                                <div class="content_section">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="text" disabled="disabled" class="form-control" placeholder="Документ">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" disabled="disabled" data-name="docDateEmpty" class="date form-control" readonly="readonly" placeholder="01.01.2000" />
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
                            <input type="text" style="width:80%;" data-name="docDate" class="date readonly=" readonly"
                                name="docDate[]" placeholder="01.01.2000">

                            <div class="control_section topnull" style="width:20%;">
                                <div class="delete"></div>
                                <div class="add" style="display: none;"></div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <input type="text" style="width:80%;" disabled="disabled" placeholder="Документ">
                        </div>

                        <div class="col-lg-3 align-items-start">
                            <input type="text" style="width:20%;" disabled="disabled" data-name="docDateEmpty" class="date"
                                readonly="readonly" placeholder="01.01.2000">
                        </div> --}}
                    </div>
                </fieldset>

                <div>
                    <label for="nameWorkCostruct" class=" col-form-label">Разрешается производство последующих
                        работ</label>
                    <input type="text" name="nameWorkCostruct" class="form-control" id="nameWorkCostruct" placeholder="">

                </div>
                <div>
                    <label for="moreInfo" class=" col-form-label">Дополнительные сведения </label>
                    <input type="text" name="moreInfo" class="form-control" id="moreInfo" placeholder="">
                </div>
                <div>
                    <label for="countAOSR" class=" col-form-label">Количество экземпляров</label>
                    <input type="number" name="countAOSR" class="form-control" id="countAOSR" placeholder="">
                </div>
                <fieldset style="display:block;background:none;">
                    <div class="form-group row d-flex">
                        <label for="application" class=" col-form-label col-12">Приложения</label>

                        <div class="forms col-12">

                            <div class="add_section first_section">
                                <div class="content_section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="countSuppl[]" class="form-control" placeholder="Приложение">
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
                                            <input type="text" name="countSuppl2" class="form-control" placeholder="Приложение">
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
                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                    <label for="representativeBuilderFIO" class="col-md-12 col-form-label">Дополнительные
                            Приложения</label>

                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-12">
                                <input type="text" value="Дополнительные Приложения" name="application2" class="form-control" id="application2" placeholder="">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                        <label for="representativeBuilderFIO" class="col-md-12 col-form-label">Представитель застройщика</label>

                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeBuilderFIO" class="form-control" id="representativeBuilderFIO" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeBuilderPosition" class="form-control " id="representativeBuilderPosition" placeholder="Должность">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeBuilderId" class="form-control " id="representativeBuilderId" placeholder="Идентификационный номер">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeBuilderRequisites" class="form-control col-md" id="representativeBuilderRequisites" placeholder="Реквизиты распорядительного документа">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="representativeBuilderDateGet" class="form-control col-md-6" id="representativeBuilderDateGet" placeholder="Даты выдачи документа">
                            </div>
                            
                        </div>
                </fieldset>

                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                        <label for="workerPres2" class="col-md-12 col-form-label">Представитель лица по вопросам строительного контроля</label>
                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderPosition" class="form-control " id="memberBuilderPosition" placeholder="Должность">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderId" class="form-control " id="memberBuilderId" placeholder="Идентификационный номер">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderRequisites" class="form-control " id="memberBuilderRequisites" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="memberBuilderDateId" class="form-control col-md-6" id="memberBuilderDateId" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                        <label for="workerPres3" class="col-md-12 col-form-label">Представитель лица, осуществляющего строительство
                        </label>
                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeContractorFIO" class="form-control" id="representativeContractorFIO" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeContractorPosition" class="form-control " id="representativeContractorPosition" placeholder="Должность">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="representativeContractorRequisites" class="form-control " id="representativeContractorRequisites" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="representativeContractorDate" class="form-control col-md-6" id="representativeContractorDate" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                        <label for="workerPres4" class="col-md-12 col-form-label">Представитель лица, осуществляющего подготовку
                            проектной документации</label>
 
                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="preparationFIO" class="form-control" id="preparationFIO" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="preparationPosition" class="form-control " id="preparationPosition" placeholder="Должность">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="preparationREQ" class="form-control " id="preparationREQ" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="preparationDateId" class="form-control col-md-6" id="preparationDateId" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset style="display:block;background:none;">
                    <div class="form-group row">
                        <label for="workerPres5" class="col-md-12 col-form-label">Представитель лица, выполнившего работы, подлежащие
                            освидетельствованию</label>

                        <div class="col-md-12 inputs-wrapper form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderPosition" class="form-control " id="memberBuilderPosition" placeholder="Должность">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="memberBuilderId" class="form-control " id="memberBuilderId" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="memberBuilderDateId" class="form-control col-md-6" id="memberBuilderDateId" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset style="display:block;background:none;">
                    <div class="form-group row forms">
                        
                        <label for="workerPres5" class="col-md-12 col-form-label">Представители иных лиц</label>
                        <div class="col-md-12">
                        <div class="col-md-12 inputs-wrapper form-row add_section first_section">
                            <div class="form-group col-md-6">
                                <input type="text" name="anotherFIO[]" class="form-control" id="anotherFIO[]" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" name="anotherPosition[]" class="form-control " id="anotherPosition[]" placeholder="Должность">
                            </div>
                            <div class="col-md-1 control_section topnull">
                                <div class="delete"></div>
                                <div class="add" style="display: none;"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="anotherREQ[]" class="form-control " id="anotherREQ[]" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="anotherDate_Id[]" class="form-control col-md-6" id="anotherDate_Id[]" placeholder="Даты выдачи документа">
                            </div>
                            
                        </div>
                        <div class="col-md-12 inputs-wrapper form-row add_section">
                            <div class="form-group col-md-6">
                                <input type="text" disabled name="anotherFIO[]" class="form-control" id="anotherFIO[]" placeholder="Фамилия, инициалы">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" disabled name="anotherPosition[]" class="form-control " id="anotherPosition[]" placeholder="Должность">
                            </div>
                            <div class="control_section col-md-1">
                                <div class="delete" style="display: none;"></div>
                                <div class="add"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" disabled name="anotherREQ[]" class="form-control " id="anotherREQ[]" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" disabled name="anotherDate_Id[]" class="form-control col-md-6" id="anotherDate_Id[]" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                    </div>
                    </div>
                </fieldset>
                <div>
                    <input type="submit" name="save" class=" action-button btn btn-primary btn-lg" role="button" aria-disabled="true" value="Сохранить">
                </div>

            </form>

        </div>
    </div>
</section>
<!-- <section>
    <div class="container">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 head_admin-list">
                <h2>Новый АОСР</h2>

                <div class="table-responsive">
                    <form class="form-ojr" action="/personal/list/ojr/add/save" id="msform">
                        <input type="hidden" name="idOjr" value="{{$ojr->id}}">
                        <div class="form-group row">
                            <label for="numberAct" class="col-sm-2 col-form-label">Акт №</label>
                            <div class="col-sm-10">
                                <input name="numberAct" type="text" class="form-control" id="numberAct" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateAOSR" class="col-sm-2 col-form-label">от</label>
                            <div class="col-sm-10">
                                <input name="dateAOSR" value="{{$ojr->date_start}}" type="date" class="form-control" id="dateAOSR" value="" placeholder="">
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
                                <input type="text" value="{{$ojr->title}}" name="projectName" class="form-control" id="projectName" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateGo" class="col-sm-2 col-form-label">Даты проведения работ</label>
                            <div class="col-sm-10">
                                c<input type="date" value="{{ $ojr->date_start }}" name="dateBeginWork" class="form-control" id="dateGo" placeholder="">
                                по<input type="date" value="{{ $ojr->date_end }}" name="dateEndWork" class="form-control" id="dateGo" placeholder="">
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
                                                    <input type="text" data-name="docDate" class="date" readonly="readonly" name="docDate[]" placeholder="01.01.2000" />
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
                                                    <input type="text" disabled="disabled" data-name="docDateEmpty" class="date" readonly="readonly" placeholder="01.01.2000" />
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
                                <input type="text" name="nameWorkCostruct" class="form-control" id="nameWorkCostruct" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="moreInfo" class="col-sm-2 col-form-label">Дополнительные сведения </label>
                            <div class="col-sm-10">
                                <input type="text" name="moreInfo" class="form-control" id="moreInfo" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="countAOSR" class="col-sm-2 col-form-label">Количество экземпляров</label>
                            <div class="col-sm-10">
                                <input type="number" name="countAOSR" class="form-control" id="countAOSR" placeholder="">
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
                                <input type="text" name="application2" class="form-control" id="application2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="representativeBuilderFIO" class="col-sm-2 col-form-label">Представитель застройщика</label>
                            <div class="col-sm-10">
                                <input type="text" name="representativeBuilderFIO" class="form-control" id="representativeBuilderFIO" placeholder="Фамилия, инициалы">
                                <input type="text" name="representativeBuilderPosition" class="form-control" id="representativeBuilderPosition" placeholder="Должность">
                                <input type="text" name="representativeBuilderId" class="form-control" id="representativeBuilderId" placeholder="Должность">
                                <input type="date" name="representativeBuilderDateGet" class="form-control" id="representativeBuilderDateGet" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres2" class="col-sm-2 col-form-label">Представитель лица, осуществляющегоПредставитель лица, осуществляющего
                                строительство, по вопросам строительного контроля</label>
                            <div class="col-sm-10">
                                <input type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO" placeholder="Фамилия, инициалы">
                                <input type="text" name="memberBuilderPosition" class="form-control" id="memberBuilderPosition" placeholder="Должность">
                                <input type="text" name="memberBuilderId" class="form-control" id="memberBuilderId" placeholder="Идентификационный номер">
                                <input type="date" name="memberBuilderDateId" class="form-control" id="memberBuilderDateId" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres3" class="col-sm-2 col-form-label">Представитель лица, осуществляющего строительство </label>
                            <div class="col-sm-10">
                                <input type="text" name="representativeContractorFIO" class="form-control" id="representativeContractorFIO" placeholder="Фамилия, инициалы">
                                <input type="text" name="representativeContractorPosition" class="form-control" id="representativeContractorPosition" placeholder="Должность">
                                <input type="text" name="representativeContractorRequisites" class="form-control" id="representativeContractorRequisites" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                                <input type="date" name="representativeContractorDate" class="form-control" id="representativeContractorDate" placeholder="Дата выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres4" class="col-sm-2 col-form-label">Представитель лица, осуществляющего подготовку проектной документации</label>
                            <div class="col-sm-10">
                                <input type="text" name="preparationFIO" class="form-control" id="preparationFIO" placeholder="Фамилия, инициалы">
                                <input type="text" name="preparationPosition" class="form-control" id="preparationPosition" placeholder="Должность">
                                <input type="text" name="preparationREQ" class="form-control" id="preparationREQ" placeholder="Должность">
                                <input type="date" name="preparationDateId" class="form-control" id="preparationDateId" placeholder="Должность">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres5" class="col-sm-2 col-form-label">Представитель лица, выполнившего работы, подлежащие освидетельствованию</label>
                            <div class="col-sm-10">
                                <input type="text" name="memberBuilderFIO" class="form-control" id="memberBuilderFIO" placeholder="Фамилия, инициалы">
                                <input type="text" name="memberBuilderPosition" class="form-control" id="memberBuilderPosition" placeholder="Должность">
                                <input type="text" name="memberBuilderId" class="form-control" id="memberBuilderId" placeholder="Идентификационный номер">
                                <input type="date" name="memberBuilderDateId" class="form-control" id="memberBuilderDateId" placeholder="Даты выдачи документа">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="workerPres5" class="col-sm-2 col-form-label">Представители иных лиц</label>
                            <div class="col-sm-10">
                                <input type="text" name="anotherFIO[]" class="form-control" id="anotherFIO[]" placeholder="Фамилия, инициалы">
                                <input type="text" name="anotherPosition[]" class="form-control" id="anotherFIO[]" placeholder="Должность">
                                <input type="text" name="anotherREQ[]" class="form-control" id="anotherREQ[]" placeholder="Реквизиты распорядительного документа, подтверждающего полномочия">
                                <input type="date" name="anotherDate_Id[]" class="form-control" id="aanotherDate_Id[]" placeholder="Даты выдачи документа">

                            </div>
                        </div>
                        <input type="submit" name="save" class="action-button" value="Сохранить">
                        {{-- <input  type="submit" name="saveDownload" class="action-button" value="Сохранить/скачать"> --}}
                    </form>




                </div>
            </main>
        </div>
    </div>
</section> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<!-- Popperjs -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<!-- datepicker -->
<script type="text/javascript" src="{{ asset('assets/js/datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/i18n/datepicker.ru-RU.js') }}"></script>
<!-- Script -->
<script type="text/javascript" src="{{ asset('assets/js/rule-date.js') }}"></script>

{{-- <script type="text/javascript" src="{{ asset('assets/js/ajax.js') }}"></script> --}}
@endsection