<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use Illuminate\Support\Facades\Auth;
use App\Models\Ojr;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ExelGen;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('list');
        // return view('admin');
    }

    public function list()
    {
        $user = auth()->user();
        $DocsList = Docs::where('id_user', $user->id)->get();
        if ($DocsList !== null) {
            return view('/auth/list', ['Docs' => $DocsList]);
        }
    }

    public function updateDataUser(Request $request, $id)
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function download(Request $request, $id)
    {
        $ExelGen = new ExelGen();
        $user = auth()->user();
        $DocsList = Docs::where('id', $id)->get();


        foreach ($DocsList as $list) {
            $data = $list->date;
            $data = json_decode($data);
            $data = (array)$data;
        }
        $ExelGen->generateExcel($data, $request, true);
    }

    public function deleted(Request $request)
    {
        $id = $request->input('id');
        Docs::where('id', $id)->delete();

        return back()->withInput();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $DocsList = Docs::where('id', $id)->get();
        // dd($DocsList[0]->date);
        $data = $DocsList[0]->date;
        $data = json_decode($data);
        $data = (array)$data;
        foreach ($data['anotherPosition'] as $key => $another) {

            $data['another'][$key]['anotherPosition'] = $another;
        }

        foreach ($data['anotherFIO'] as $key => $another) {
            $data['another'][$key]['anotherFIO'] = $another;
        }
        foreach ($data['anotherREQ'] as $key => $another) {
            $data['another'][$key]['anotherREQ'] = $another;
        }
        foreach ($data['anotherDate_Id'] as $key => $another) {
            $data['another'][$key]['anotherDate_Id'] = $another;
        }
        foreach ($data['anotherNameYur'] as $key => $another) {
            $data['another'][$key]['anotherNameYur'] = $another;
        }
        foreach ($data['workDo'] as $key => $workDo) {
            $data['workDoArr'][$key]['workDo'] = $workDo;
        }
        foreach ($data['doc'] as $key => $doc) {
            $data['DOC'][$key]['doc'] = $doc;
        }
        foreach ($data['docDate'] as $key => $docDate) {
            $data['DOC'][$key]['docDate'] = $docDate;
        }
        foreach ($data['countSuppl'] as $key => $countSuppl) {
            $data['countSupplArr'][$key]['countSuppl'] = $countSuppl;
        }
        $data = (object)$data;

        return view('/auth/show', ['Docs' => $data, 'ID' => $id]);
    }

    public function docs($id){
        $DocsList = Docs::where('id', $id)->get();
        // dd($DocsList[0]->date);
        $data = $DocsList[0]->date;
        $data = json_decode($data);
        $data = (array)$data;
        foreach ($data['workDo'] as $key => $workDo) {
            $data['workDoArr'][$key]['workDo'] = $workDo;
        }

        $data = (object)$data;
        return view('/auth/docs', ['Docs' => $data, 'ID' => $id]);

    }
    public function ojr(){
        $user = auth()->user();
        $data = Ojr::where('id_user', $user->id)->get();
        $id_aosr = json_decode($data[0]->id_aosr);
        $arrAosr =[];
        $titelAocr = [];
        foreach($data as $key => $ojrData){
            $id_ojr = $ojrData->id;
            $arrIdAosr = [];
            $id_aosr_json = json_decode($ojrData->id_aosr);
            if(!empty($id_aosr_json)){
                foreach($id_aosr_json as $aosr_id){
                    $arrIdAosr[] = $aosr_id;
                }
            }
           
            $DocsList = Docs::whereIn('id', $arrIdAosr)->get();
            
            $arrAosr[$id_ojr] = $DocsList;

        }
        

        if ($data !== null) {
            return view('/auth/ojr', ['data' => $data, 'ID' => $user,'aosr'=>$arrAosr]);
        }
        



    }

    public function ojrCreate(Request $request, $id){
        $DocsList = Docs::get();
        $ojr = Ojr::where('id', $id)->get();
        $ojrAll = Ojr::where('id','!=', $id)->get();
        $ojr = json_decode($ojr)[0];

        $arrDate = [];
        foreach($DocsList as $list){
            $list->date = json_decode($list->date);
            $list->date->id = $list->id;
            $arrDate[] = $list->date;
        }

        // $data = $DocsList[0]->date;
        // $data = json_decode($data);
        // $data = (array)$data;
        // foreach ($data['workDo'] as $key => $workDo) {
        //     $data['workDoArr'][$key]['workDo'] = $workDo;
        // }

        // $data = (object)$data;
        // return view('/auth/ojr', ['Docs' => $data, 'ID' => $id]);
        return view('/auth/createojr', ['arrDate'=>$arrDate,'ojr'=>$ojr,'ojrAll'=>$ojrAll]);


    }

    public function ojrDate(Request $request){
        $id = $request->all()['id'];
        $DocsList = Docs::where('id', $id)->get();
        $arrDate = [];
        foreach($DocsList as $list){
            $list->date = json_decode($list->date);
            $list->date->id = $list->id;
            $arrDate[] = $list->date;
        }
        return json_encode($arrDate);

    }
    public function ojrView(Request $request){
        return view('/auth/ojradd');

    }
    public function ojrAdd(Request $request){
        $name = $request->input('nameOjr');
        $date_end_ojr = $request->input('date_end_ojr');
        $date_start_ojr = $request->input('date_start_ojr');


        $userId = Auth::id();
        if (Auth::check()) {
            $data = [
                'title' => $name,
                'id_user' => $userId,
                'date_start' => $date_start_ojr,
                'date_end' => $date_end_ojr
            ];
            
            $Ojr = new Ojr();
            $Ojr->fill(
                $data
            );
            $Ojr->save();
        }

        return redirect('/personal/list/ojr/');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $DocsList = $request->input();
        unset($DocsList['_token']);
        $numberAct = $DocsList['numberAct'];

        $DocsList = json_encode($DocsList, JSON_UNESCAPED_UNICODE);
        Docs::where('id', $id)->update(['date' => $DocsList, 'title' => $numberAct]);

        return redirect('/personal/list/');
    }
    public function updateDocs(Request $request, $id)
    {
        $DocsList = Docs::where('id', $id)->get();
        $DocsListWorkDo = $request->input();
        unset($DocsListWorkDo['_token']);
        $data = $DocsList[0]->date;
        $data = json_decode($data);
        $data = (array)$data;
        $data['workDo'] = $DocsListWorkDo['workDo'];
        $DocsList = json_encode($DocsList, JSON_UNESCAPED_UNICODE);
        Docs::where('id', $id)->update(['date' => $data]);
        return redirect('/personal/list/');
        
        
    }
    public function ojrSave(Request $request){
        $ExelGen = new ExelGen();
        $post = $request->input();
        $DocsList = Docs::where('id', $post['doneWork'])->get();
        $date = (array)json_decode($DocsList[0]->date);
        $replaceArray = array_replace($date, $post);
        $ojrWork = [];
        $ojrWork[] = $post['idOjr'];
        $ojrWork[] = $post['orjWork'];
        $replaceArray['idOjr'] = $post['idOjr'] ;
        dd($replaceArray);
        $ExelGen->generateExcel($replaceArray,$request,true);
        return redirect('/personal/list/ojr/');
        
    }
    public function ojrAosrSave(Request $request){
        $doc = new Docs;
        $post = $request->input();
        $DocsList = Docs::where('id', $post['idAosr'])->get();
        $date = (array)json_decode($DocsList[0]->date);
        $replaceArray = array_replace($date, $post);
        $replaceArray['idOjr'] = $post['idOjr'] ;
        $doc::where('id', $post['idAosr'])->update(['date' => json_encode($replaceArray)]);
        return redirect('/personal/list/ojr/');
        
    }
    public function ojrAosrView(Request $request,$id){
        $DocsListAll  = Docs::get();
        $DocsList = Docs::where('id', $id)->get();
        $arrDate = json_decode($DocsList[0]->date);
        $ojr = Ojr::where('id', $arrDate->idOjr)->get();
        foreach($arrDate->doc as $key =>$value){
            $arrDocs[$key]['doc'] = $value;
            $arrDocs[$key]['docDate'] = $arrDate->docDate[$key];
        }
        foreach($arrDate->countSuppl as $key =>$value){
            $arrCountSuppl[$key]['countSuppl'] = $value;
        }
        foreach($DocsListAll as $key => $value){
            $DocsListAll[$key]->date = json_decode($value->date);
        }
        return view('/auth/ojraosr', ['id'=>$id,'arrDate'=>$arrDate,'ojr'=>$ojr[0],'DocsListAll'=>$DocsListAll,'arrDocs'=>$arrDocs,'arrCountSuppl'=>$arrCountSuppl]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
