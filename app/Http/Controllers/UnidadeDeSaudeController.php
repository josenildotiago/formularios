<?php

namespace App\Http\Controllers;

use App\Models\UnidadeDeSaude;
use Illuminate\Http\Request;

class UnidadeDeSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadeDeSaude  $unidadeDeSaude
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadeDeSaude $unidadeDeSaude)
    {
        $data = UnidadeDeSaude::select('unidade', 'count')->get();
        return $data->map(function ($item) {
            return [
                'unidade' => $item->unidade,
                'count' => (int) $item->count
            ];
        });

        // $counts = $data->map(function ($item) {
        //     return (int) $item->count;
        // });
        // $units = $data->map(function ($item) {
        //     return $item->unidade;
        // });


        // $chartData = [
        //     'labels' => $units,
        //     'datasets' => [
        //         [
        //             'label' => 'Unidade',
        //             'data' => $counts,
        //         ],
        //     ],
        // ];
        // return $chartData;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadeDeSaude  $unidadeDeSaude
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadeDeSaude $unidadeDeSaude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadeDeSaude  $unidadeDeSaude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadeDeSaude $unidadeDeSaude)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadeDeSaude  $unidadeDeSaude
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadeDeSaude $unidadeDeSaude)
    {
        //
    }

    public function count(){
        $sum = UnidadeDeSaude::sum('count');
        return $sum;
    }

    public function quantRespoPorUnid(){
        $count = UnidadeDeSaude::where('count', '>', 0)->count();
        return $count;
    }
}
