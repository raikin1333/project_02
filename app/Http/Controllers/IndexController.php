<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Thing;
use App\Models\Workflow;

class IndexController extends Controller
{
    // // 
    // protected BidLogApplicationService $bidLogApplicationService;

    // 
    public function __construct()
    {
        
    }

    //
    public function index(Request $request, ?string $object_id = null)
    {
        // ログインユーザの情報を取得
        $user = Auth::user();
        // $user->id
        // dd($user);

        // object_idがnullのとき、ログインユーザのROOTディレクトリを割り当てる
        $root_object = Thing::where('user_id', $user->id)->where('object_title', 'ROOT')->first();
        if($object_id == null){
            $object_id = $root_object->id;
        }
        else{
            
        }

        // オブジェクト基本情報を取得
        $object = Thing::where('id', $object_id)->first();
        $data['object']['object_id'] = $object->id;
        $data['object']['object_title'] = $object->object_title;
        $data['object']['object_type'] = $object->object_type;
        $data['object']['parent_object_id'] = $object->parent_object_id;
        // dd($data['object']);

        // ディレクトリ階層を取得
        $count = 0;
        while(True){
            $object = Thing::where('id', $object_id)->first();
            // 親オブジェクトがROOTディレクトリのとき、ループを終了
            if($object->id == $root_object->id){
                $data['layers'][$count]['object_id'] = $object->id;
                $data['layers'][$count]['object_title'] = $object->object_title;
                break;
            }
            else{
                $data['layers'][$count]['object_id'] = $object->id;
                $data['layers'][$count]['object_title'] = $object->object_title;
                $object_id = $object->parent_object_id;
            }
            $count += 1;
        }
        $data['layers'] = array_reverse($data['layers']);
        // dd($data['layers']);

        // 子オブジェクトを取得
        $data['child_objects'] =  Thing::where('parent_object_id', $data['object']['object_id'])->get()->toArray();
        // dd($data['child_objects']);

        
        // // 任意のobjectの情報
        // $data['object'] = 
        //     [
        //         'object_id' => '00000',
        //         'object_id_type' => 'dir',
        //         'title' => 'ROOT',
        //         'parent_object_id' => '00000',
                
        //     ];

        // // 任意のobjectのディレクトリ階層
        // $data['layers'] = 
        //     [
        //         [
        //             'object_id' => '00000',
        //             'title' => 'ROOT',
        //         ],
        //         [
        //             'object_id' => '00000',
        //             'title' => 'REINS',
        //         ],
        //         [
        //             'object_id' => '00000',
        //             'title' => '沖縄県の不動産データを取得する',
        //         ],
        //     ];

        // // 任意のobjectの子object
        // $data['child_objects'] =
        //     [
        //         [
        //             'object_id' => '0000',
        //             'title' => 'REINS',
        //             'object_type' => 'dir',
        //             'explain' => '不動産情報をスクレイピングするフォルダ',
        //         ],
        //         [
        //             'object_id' => '0000',
        //             'title' => '楽天市場から商品情報を取得する',
        //             'object_type' => 'scr',
        //             'explain' => '楽天市場から商品情報を取得する',
        //         ],
        //         [
        //             'object_id' => '0000',
        //             'title' => 'Amazon',
        //             'object_type' => 'dir',
        //             'explain' => 'Amazonの商品情報をスクレイピングするフォルダ',
        //         ],
        //     ];

        return view('index', $data);
    }
    
}
