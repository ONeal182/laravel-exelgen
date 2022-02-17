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
            <h2>Новый ОЖР</h2>
            
            <div class="table-responsive">
                <form>
                    <div class="form-group row">
                      <label for="actNumber" class="col-sm-2 col-form-label">Акт №</label>
                      <div class="col-sm-10">
                        <input name="actNumber" type="text"  class="form-control" id="actNumber" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="dateStart" class="col-sm-2 col-form-label">от</label>
                      <div class="col-sm-10">
                        <input name="dateStart" type="password" class="form-control" id="dateStart" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="workName" class="col-sm-2 col-form-label">Наименование работ</label>
                        <div class="col-sm-10">
                          <input type="password" name="workName" class="form-control" id="workName" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="dateGo" class="col-sm-2 col-form-label">Даты проведения работ</label>
                        <div class="col-sm-10">
                          c<input type="date" name="dateGo" class="form-control" id="dateGo" placeholder="">
                          по<input type="date" name="dateGo" class="form-control" id="dateGo" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="docsAcept" class="col-sm-2 col-form-label">Документы, подтверждающие соответствие работ предъявленным к ним требованиям </label>
                        <div class="col-sm-10">
                          <input type="password" name="docsAcept" class="form-control" id="docsAcept" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="dateGo" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          c<input type="date" name="dateGo" class="form-control" id="dateGo" placeholder="">
                          по<input type="date" name="dateGo" class="form-control" id="dateGo" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="makeWork" class="col-sm-2 col-form-label">Разрешается производство последующих работ</label>
                        <div class="col-sm-10">
                          <input type="password" name="makeWork" class="form-control" id="makeWork" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="dopInfo" class="col-sm-2 col-form-label">Дополнительные сведения </label>
                        <div class="col-sm-10">
                          <input type="password" name="dopInfo" class="form-control" id="dopInfo" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="countAct" class="col-sm-2 col-form-label">Количество экземпляров</label>
                        <div class="col-sm-10">
                          <input type="number" name="countAct" class="form-control" id="countAct" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="application" class="col-sm-2 col-form-label">Приложения</label>
                        <div class="col-sm-10">
                          <input type="number" name="application" class="form-control" id="application" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="application2" class="col-sm-2 col-form-label">Дополнительные 
                            Приложения </label>
                        <div class="col-sm-10">
                          <input type="number" name="application2" class="form-control" id="application2" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="workerPres" class="col-sm-2 col-form-label">Представитель застройщика</label>
                        <div class="col-sm-10">
                          <input type="text" name="workerPres" class="form-control" id="workerPres" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="workerPres2" class="col-sm-2 col-form-label">Представитель лица, осуществляющего строительство</label>
                        <div class="col-sm-10">
                          <input type="text" name="workerPres2" class="form-control" id="workerPres2" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="workerPres3" class="col-sm-2 col-form-label">Представитель лица, осуществляющего строительство, по вопросам строительного контроля </label>
                        <div class="col-sm-10">
                          <input type="text" name="workerPres3" class="form-control" id="workerPres3" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="workerPres4" class="col-sm-2 col-form-label">Представитель лица, выполнившего работы, подлежащие освидетельствованию</label>
                        <div class="col-sm-10">
                          <input type="text" name="workerPres4" class="form-control" id="workerPres4" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="workerPres5" class="col-sm-2 col-form-label">Представители иных лиц</label>
                        <div class="col-sm-10">
                          <input type="text" name="workerPres5" class="form-control" id="workerPres5" placeholder="">
                        </div>
                      </div>
                  </form>
              <a href="/personal/list/ojr/" class="">
                <input type="button" name="" class="action-button" value="Сохранить">
            </a>
            <a href="/personal/list/ojr/" class="">
                <input type="button" name="" class="action-button" value="Отменить">
            </a>
            <a href="/personal/list/ojr/" class="">
                <input type="button" name="" class="action-button" value="Скачать">
            </a>
            </div>
          </main>
    </div>
</div>
@endsection