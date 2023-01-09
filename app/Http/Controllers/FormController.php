<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use App\Models\UnidadeDeSaude;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormularioRequest $request)
    {
        $cnes = $request->input('cnes');
        $unit = UnidadeDeSaude::where('cnes', $cnes)->first();
    
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $respon = $request['g-recaptcha-response'];
        $data = array('secret' => "6LdHH5UUAAAAAMDIr3lCzzyALxsTtic7F4kHxHZ0", 'response' => $respon);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $jsom = json_decode($result);

        if($jsom->success){
            if ($unit) {
                $unit->increment('count');
                $unit->save();
                return redirect()->route('webview');
            } else {
                return back()->with([
                    'erro' => 'Número de unidade não encontrado!!',
                ]);
            }
            
        }

        return back()->with([
            'erro' => 'Necessário clicar em não sou um robô!!',
        ]);
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
        //
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
