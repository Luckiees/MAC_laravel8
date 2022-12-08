<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class PostModelController extends Controller
{
      //웹 최초 진입 시 처리
      public function index(){
        $PostModel = PostModel::all();
        return view('main')->with('PostModel', $PostModel);
        //return view('main',compact('PostModels')); //얘는 배열로 가져감.
        // Illuminate ORM에서 제공하는 함수. orderBy('컬럼', '정렬')->1p당 7개 게시물 출력;
         $PostModel = PostModel::orderBy('created_at', 'desc')->paginate(7); 
           
    }
    //create 요청
    public function create(){
        return view('create');
         /* foreach ($PostModel as $post) 원하는 값만 받아올 수 있으나 굳이 이 방법이 아니어도 될듯 */
    }
    //create한 내용 DB 저장
    public function store(Request $request){
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
        return redirect('/list');
    }
        //id로 선택된post 내용 출력
    public function show($id){
        $PostModel = PostModel::findOrFail($id);
        return view('show', compact('PostModel'));
    }
    //post 편집 요청
    public function edit($id){
        $PostModel = PostModel::find($id);
        return view('edit', compact('PostModel'));
    }
    //post update 요청
    public function update($id){
        $PostModel = PostModel::findOrFail($id);
        $validator = Validator::make($data = Input::all(), PostModel::rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $PostModel->update($data);
        return redirect()->route('index');
    }
    public function destroy($id){
        PostModel::destroy($id);
        return redirect()->route('index');
    }
    //삭제 요청
    public function delete(Request $request){
        $PostModel = PostModel::find($request->id);
        $PostModel->delete();
        return redirect()->route('index');
    }
    
}