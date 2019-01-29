<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function info($id=''){
       // return 'member-info:id-'.$id.' route-'.route('memberinfo');
//        return view('member/info',[//视图调用
//            'name' => 'zxm',
//            'age' => 18,
//        ]);
        return Member::getMember();//直接调用模型::方法
    }
}
