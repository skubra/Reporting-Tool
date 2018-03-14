<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Report;
use \App\Graph;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($reportId)
    {
        $report = Report::find($reportId);

        return view('pages.adminpages.raporislemleri.graph',compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reportId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($reportId, Request $request)
    {
        $report = Report::find($reportId);

        $graph = new Graph;

        $graph->type = $request->type;
        $graph->title = $request->title;
        $graph->x_axis_title = $request->x_axis_title;
        $graph->x_axis_param = $request->x_axis_param;
        $graph->y_axis_title = $request->y_axis_title;
        $graph->y_axis_param = $request->y_axis_param;

        $graph->save();

        $report->graphs()->attach($graph);

        return redirect()->route('graph.index', [$reportId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reportId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($reportId, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($reportId, Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($reportId, $id)
    {
        //
    }
}
