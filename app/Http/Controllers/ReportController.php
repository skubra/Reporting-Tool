<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Menu;
use App\FormParam;
use App\FormContentParam;
use App\AuthorityGroup;
use Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facade as Debugbar;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $reports = Report::latest()->get();
        $menus = Menu::all();
        return view ('pages.adminpages.raporislemleri',compact('reports','menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pages.adminpages.raporislemleri.create');
    }

     /**
     * Hata mesajları
     */
    public function messages(){
        return [
            'menuid.required'  => 'Menü boş kalamaz.',
            'dbquery.required'  => 'Sorgu boş kalamaz.',
            'title.required'  => 'Başlık boş kalamaz.',
            'title.unique' => 'Bu başlık veritabanında bulunmaktadır.'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate(request(), [
            'menuid' => 'required',
            'title' => 'required|unique:reports',
            'dbquery' => 'required',
        ], $this->messages());

        $report = new Report;

        $report->menuid = $request->menuid;
        $report->title = $request->title;
        $report->dbquery = $request->dbquery;

        $report->save();

        $i=1;
        $type="type".$i;
        $label="label".$i;

        while(isset($request->$type)){
            $param = new FormParam;

            $param->type = strtolower($request->$type);
            $param->label = $request->$label;
            $param->name = str_replace(' ', '', strtolower($request->$label));

            $param->save();
            $report->params()->attach($param);

            $i++;
            $type = "type".$i;
            $label = "label".$i;
        }

        $groups = $request->group;

        foreach ($groups as $key => $value) {
            $group = AuthorityGroup::find($value);
            $group->prohibited_reports()->attach($report);
        }

        return redirect()->route('raporislemleri.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $report = Report::find($id);
        return view('pages.adminpages.raporislemleri.show')->withReport($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $report = Report::find($id);
        $form_elements = $report->params->toArray();

        return view('pages.adminpages.raporislemleri.edit',compact('report','form_elements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $report = Report::find($id);

        $report->menuid = $request->menuid;
        $report->title = $request->title;
        $report->dbquery = $request->dbquery;
        $report->save();

        $form_elements = $report->params->toArray();

        foreach ($form_elements as $element) {

            $el = FormParam::find($element['id']);

            $name = $element['name'];
            $type = $name . "_t";
            $label = $name . "_l";

            $el['type'] = $request->$type;
            $el['label'] = $request->$label;
            $el['name'] = str_replace(' ', '', strtolower($el['label']));

            $el->save();
        }

        return redirect()->route('raporislemleri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $report = Report::find($id);
        $report->params()->detach();
        $report->group()->detach();
        $report->delete();

        return redirect()->route('raporislemleri.index');
    }

    public function showContent($id){
        $report = Report::find($id);
        $menus = Menu::all();
        $reports = Report::all();

        $form_elements = $report->params->toJson();

        return view('pages.userpages.rapor',compact('menus','reports','report','form_elements'));
    }

    public function loadReportContent(Request $request, $id){

        $values = $_POST['values'];
        array_shift($values); // Bu şekilde _token değerini sorguya dahil etmiyoruz
        $values = array_values($values); // key => value ikilisinde sadece value kısmını alıyoruz

        $report = Report::find($id);

        $values_str = implode(',', array_fill(0, count($values), '?'));
        $sql = "call ".$report->dbquery."({$values_str})";
        $results = DB::select($sql, $values);

        $response = array(
          'status' => 'success',
          'results' => $results,
          'values' => $values
        );

        return response()->json($response);

    }

}
