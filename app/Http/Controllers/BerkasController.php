<?php

namespace App\Http\Controllers;

use App\Berkas;
use App\Document;
use App\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function index()
    {

        $unduh = Document::paginate(10);
        return view('dokumen', compact('unduh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('download.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Document;
        if($request->file('file')){
            $unduh=$request->file('file');
            $filename =time(). '.' .$unduh->getClientOriginalExtension();
            $request->unduh->move('storage/', $filename);

            $data->unduh = $filename;
        }
        $data->title = $request->title;
        $data->description= $request->description;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Document::find($id);
        return view ('download.details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($unduh){
        return response()->download('storage/'.$unduh);
    }



    // public function index(){
    //     $berkas = berkas::orderBy('created_at', 'desc')->paginate(5);
    //     return view('dokumen', compact('berkas'));
        
    // }
    // public function data($download){
    //     $berkas = berkas::where('dokumen', '=', $download)->firstOrFail();

    //     // $berkas = berkas::where('id', '=', $dokumen)->firstOrFail();
    //     return view('data', compact('berkas'));
    // }
    // public function show(){
    //     // $path = Storage::url('kvXGzkm8HN8qbAOWJ9gu.png');
    //     // return '<img src="'.$path.'" alt="">';
    // }
    // public function view(){
    //     return view('dokumen.preview');
    // }
    // public function download(){
    //     try{
    //         return Storage::disk('local')->download('public/berkas/Review.pdf');
    //     } catch (\Exception $e){
    //         return $e->getMassage();
    //     }
    // }
}
 