<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Report;

class MenuController extends Controller
{

	/**
     * Hata mesajları
     */
	
    public function messages(){
        return [
            'required' => 'Başlık boş kalamaz.',
            'unique' => 'Bu başlıkta bir menü zaten bulunmaktadır.'
        ];
    }

	public function index(){
		$menus=Menu::all();
        return view ('pages.adminpages.kategoriislemleri',compact('menus'));
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
            'title' => 'required|unique:menus'
        ], $this->messages());

        $group = new Menu;
        $group->title = $request->title;
        $group->save();

        return redirect()->route('kategori.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $t_menu = Menu::find($id); // Target menu
        return view('pages.adminpages.kategoriislemleri.edit', compact('t_menu'));
    }


    /**
     * Update the title of specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $menu->title = $request->title;
        $menu->save();

        return redirect()->route('kategori.index');;
    }


}
