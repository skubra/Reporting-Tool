<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Report;
use App\Menu;
use App\AuthorityGroup;

class UserPermissionController extends Controller
{
    /**
     * Hata mesajları
     */
    public function messages(){
        return [
            'required' => 'Başlık boş kalamaz.',
            'unique' => 'Bu başlıkta bir yetki grubu zaten bulunmaktadır.'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=AuthorityGroup::all();
        return view('pages.adminpages.yetkigruplari', compact('groups'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|unique:authority_groups'
        ], $this->messages());

        $group = new AuthorityGroup;
        $group->title = $request->title;
        $group->save();

        return redirect()->route('yetkigruplari.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = AuthorityGroup::find($id);
        $reports = Report::all();
        $menus = Menu::all();
        return view('pages.adminpages.yetkigruplari.edit', compact('reports','menus','group'));
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
        $group = AuthorityGroup::find($id);

        $arr = $request->input('list');
        DB::table('authority_group_report')->where('authority_group_id', '=', $group->id)->delete();

        if(isset($arr)){
            foreach ($arr as $key => $value) {
            $report = Report::find($value);

            if (!in_array($report->id, array_column($group->prohibited_reports->toArray(), 'id') )) {
                $group->prohibited_reports()->attach($report);
            }
        }
        }

        return redirect()->route('yetkigruplari.index');;
    }

    /**
     * Update the title of specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTitle(Request $request, $id)
    {
        $group = AuthorityGroup::find($id);

        $group->title = $request->title;
        $group->save();

        return redirect()->route('yetkigruplari.index');;
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
