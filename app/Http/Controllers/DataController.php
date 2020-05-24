<?php

namespace App\Http\Controllers;

use DB;
use App\Data;
use App\Kabupaten;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
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
        $data = Data::select('tb_data.id','id_kabupaten','kabupaten','sembuh','rawat','positif','meninggal')
                ->join('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
                ->get();
        $test = Data::select('tb_data.id','id_kabupaten','kabupaten','sembuh','rawat','positif','meninggal')
                ->join('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
                ->where('tgl_data', Data::max('tgl_data'))->orderBy('tgl_data','desc')
                ->get();
        $sembuh = Data::where('tgl_data', Data::max('tgl_data'))->orderBy('tgl_data','desc')
                ->sum('sembuh');
        $positif = Data::where('tgl_data', Data::max('tgl_data'))->orderBy('tgl_data','desc')
                ->sum('positif');
        $meninggal = Data::where('tgl_data', Data::max('tgl_data'))->orderBy('tgl_data','desc')
                ->sum('meninggal');
        $rawat = Data::where('tgl_data', Data::max('tgl_data'))->orderBy('tgl_data','desc')
                ->sum('rawat');
        $kabupaten = Kabupaten::all();
        $date   = \Carbon\Carbon::now()->format('d F Y');
        return view('data.create',compact('kabupaten','data','test','sembuh','positif','rawat','meninggal','date'));
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
    
    $kabupaten = $request->kabupaten;
    $tgl_data = $request->tgl_data;
    $rawat= $request->rawat;
    $sembuh= $request->sembuh;
    $meninggal= $request->meninggal;

    $positif = $rawat+$sembuh+$meninggal;


    $data = array(
        'Kabupaten' => $kabupaten,
        'Tanggal' => $tgl_data
    );

    $count = DB::table('tb_data')->where('id_kabupaten', $kabupaten)
                                ->where('tgl_data',  $tgl_data)
                                ->count();
    if($count > 0){
        return redirect()->back();
    }else{
        // DB::table('teammembersall')->insert($data);
        $data = new Data;
        $data->tgl_data= $request->tgl_data;
        $data->id_kabupaten= $request->kabupaten;
        $data->sembuh = $request->sembuh;
        $data->rawat= $request->rawat;
        $data->positif= $positif;
        $data->meninggal= $request->meninggal;
        $data->save();
    }

    session()->flash('msg', 'Successfully done!.');
    return redirect('/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $data = Data::select('tb_data.id','kabupaten','sembuh','rawat','positif','meninggal','tgl_data')
                ->join('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
                ->where('tb_data.id_kabupaten','=',$data)
                ->get();
        
        return view('detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Data $data)
    {
        // $data->update($request->all());
        // $test = $request->id;
        $rawat= $request->rawat;
        $sembuh= $request->sembuh;
        $meninggal= $request->meninggal;
        $positif = $rawat+$sembuh+$meninggal;

        $data->sembuh = $request->sembuh;
        $data->rawat= $request->rawat;
        $data->positif= $positif;
        $data->meninggal= $request->meninggal;
        $data->save();

        return redirect('/data');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $data->delete(); 
        return redirect('/data')->with('alert-success','Data berhasil dihapus!');
    }
}
