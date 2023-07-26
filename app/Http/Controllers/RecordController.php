<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Thing;
use App\Models\Workflow;

class RecordController extends Controller
{
    // 
    public function get_record(Request $request)
    {
        // ログインユーザの情報を取得
        $user = Auth::user();
        // $user->id
        // dd($user);

        // 前ページのobject_idを取得
        $parent_object_id = $request->input('parent_object_id');

        // ディレクトリ階層を取得
        $object_id = $parent_object_id;
        $root_object = Thing::where('user_id', $user->id)->where('object_title', 'ROOT')->first();
        $count = 0;
        while(True){
            $object = Thing::where('id', $object_id)->first();
            // 親オブジェクトがROOTディレクトリのとき、ループを終了
            if($object->object_id == $root_object->object_id){
                $data['layers'][$count]['object_id'] = $object->object_id;
                $data['layers'][$count]['object_title'] = $object->object_title;
                break;
            }
            else{
                $data['layers'][$count]['object_id'] = $object->object_id;
                $data['layers'][$count]['object_title'] = $object->object_title;
                $object_id = $object->parent_object_id;
            }
            $count += 1;
        }
        $data['layers'] = array_reverse($data['layers']);
        // 新規作成するスクレイピングのデフォルト値
        $data['layers'][$count+1]['object_id'] = '';
        $data['layers'][$count+1]['object_title'] = '新しいスクレイピング';
        // dd($data['layers']);

        // $data['layers'] = 
        //     [
        //         [
        //             'object_id' => '00000',
        //             'object_title' => 'ROOT',
        //         ],
        //         [
        //             'object_id' => '00000',
        //             'object_title' => 'REINS',
        //         ],
        //         [
        //             'object_id' => '00000',
        //             'object_title' => '新しいスクレイピング',
        //         ],
        //     ];

        // セッションにデータを保存
        $request->session()->put('parent_object_id', $parent_object_id);

        return view('record', $data);
    }

    // 
    public function post_record(Request $request)
    {
        // Ajax通信（ワークフローを追加したときの処理）
        if ($request->ajax()) {
            // セッションにデータを保存
            $request->session()->put('workflow', $request->name);

            return response()->json(['success' => true]);
        }
        // 次へボタンを押したときの処理
        else{
            // セッションにデータを保存
            $request->session()->put('name', $request->name);

            // 次のページを表示
            return redirect()->route('/scr/setting');
        }
    }


    //
    public function get_setting(Request $request)
    {
        // ディレクトリ階層を取得
        $data['layers'] = 
            [
                [
                    'object_id' => '0000',
                    'title' => 'ROOT',
                ],
                [
                    'object_id' => '0000',
                    'title' => 'REINS',
                ],
            ];

        return view('setting', $data);
    }

    //
    public function post_setting(Request $request)
    {
        // Ajax通信
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        else{
            // バリデーション
            $request->validate([
                'name' => 'required',
            ]);

            // セッションにデータを保存
            $request->session()->put('name', $request->name);

            // 次のページを表示
            return redirect()->route('/scr/setting');
        }
        
    }


    //
    public function create_scraping(Request $request)
    {
        // セッションからデータを取得
        $title = $request->session()->get('title');
        $parent_object_id = $request->session()->get('parent_object_id');

        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');
        $parent_object_id = $request->session()->get('parent_object_id');

        // レコード（スクレイピングオブジェクト）の新規作成
        $object = new Thing;
        $object->object_type = 'scr';
        $object->title = $title;
        $object->parent_object_id = $parent_object_id;

        $object->parent_object_id = $parent_object_id;
        $object->parent_object_id = $parent_object_id;
        $object->parent_object_id = $parent_object_id;
        $object->parent_object_id = $parent_object_id;
        $object->parent_object_id = $parent_object_id;
        $object->parent_object_id = $parent_object_id;
        $object->save();


        $data['object'] = 
            [
                'object_id' => $object->object_id,
                'object_type' => $object->object_type,
                'title' => $object->title,
                'parent_object_id' => $object->parent_object_id,

                'object_type' => $object->object_type,
                'object_type' => $object->object_type,
                'object_type' => $object->object_type,
                'object_type' => $object->object_type,
                'object_type' => $object->object_type,
            ];

        return view('detail/' + $object->object_id, $data);
    }

}
