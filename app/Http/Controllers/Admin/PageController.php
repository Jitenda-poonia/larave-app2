<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $pages = Page::all();
        // dd($pages);
        return view('admin.page.index', compact('pages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
        $data = $request->validate([
            "title"=> "required",
            "heading"=> "required",
            "ordering"=> "required|numeric",
            "status"=> "required",
            "url_key"=> "unique:pages",
            "description"=> "required",
            // "image"=> "required",
        ]);
        
        $url_key = $data['url_key'] ? $data['url_key'] : $data['title'];
        $data['url_key'] = str::lower(str::replace(" ","-", $url_key));
       

        $fileName = time() . '.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->storeAs('public/upload', $fileName);
       
        $data['banner_image'] = $fileName;
        
        Page::create($data);
          
       
       
       return redirect()->route('page.index')->with('success','Data Save Successfully');
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
        $page = Page::find($id);
        return view('admin.page.edit', compact('page'));
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
        
        $data = $request->validate([
            "title"=> "required",
            "heading"=> "required",
            "ordering"=> "required",
            "status"=> "required",
            "url_key"=> "unique:pages,url_key,".$id,
            "description"=> "required",
            // "image"=> "required",
        ]);

        $url_key = $data['url_key'] ? $data['url_key'] : $data['title'];
        $data['url_key'] = str::lower(str::replace(" ","-", $url_key));
       
      
        $page =  Page::findOrFail($id);
        $page->update($data);
     
        return redirect()->route('page.index')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page.index')->with('success','Data Delete successfully');
    }
    public function upload(Request $request) {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('media'), $fileName);
      
            $url = asset('media/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
