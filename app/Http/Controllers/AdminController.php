<?php

namespace App\Http\Controllers;

use App\Models\Docs;
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
