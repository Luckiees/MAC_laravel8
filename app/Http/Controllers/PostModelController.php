<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PostModel = PostModel::all();
        // Illuminate ORM에서 제공하는 함수. orderBy('컬럼', '정렬')->1p당 7개 게시물 출력;
        $user = User::find('id');
        return view('main')->with('user','$user')->with('posts', $user->posts);
        //$PostModel = PostModel::orderBy('created_at', 'desc')->paginate(7); 
        //return view('main',compact('PostModels')); //얘는 배열로 가져감.
        
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //유효성 검사를 위한 클래스(라라벨에 기본 내장되어 있음)
        // $PostModel = PostModel::make($data = Input::all(), PostModel::$rules);
        // if($PostModel->fails())//실패 시
        // {
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        //     //에러 리턴받아서 뒤로 가기 및 에러 확인하도록 유도
        // }
        $PostModel = PostModel::create([
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return redirect('/list', compact('PostModel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PostModel = PostModel::findOrFail($id);

        $board = PostModel::where('id', '=', $id)
                            ->select('title', 'content', 'create_at')
                            ->get();
        return view('show', compact('PostModel', 'board'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PostModel = PostModel::find($id);
        return view('edit', compact('PostModel'));
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
        $PostModel = PostModel::findOrFail($id);
        $validator = Validator::make($data = Input::all(), PostModel::rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $PostModel->update($data);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostModel::destroy($id);
        return redirect()->route('index');
    }
}
