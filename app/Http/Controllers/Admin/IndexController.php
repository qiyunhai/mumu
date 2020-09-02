<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $arr = [
            'homeInfo'=>[
                'title'=>'首页',
                'href'=>'href'
            ],
            'logoInfo'=>[
                'title'=>'LAYUI MINI',
                'image'=>'images/logo.png',
                'href'=>'https://www.baidu.com'
            ],
            'menuInfo'=>[
                [
                    'title'=>'常规管理',
                    'icon'=>'fa fa-address-book',
                    'href'=>'https://www.baidu.com',
                    'target'=>'_self',
                    'child'=>[
                        'title'=>'主页模板',
                        'icon'=>'fa fa-tachometer',
                        'href'=>'https://www.baidu.com',
                        'target'=>'_self',
                        'child'=>[
                            'title'=>'主页1',
                            'icon'=>'fa fa-tachometer',
                            'href'=>'https://www.baidu.com',
                            'target'=>'_self'
                        ]
                    ]
                ],
                [
                    'title'=>'测试管理',
                    'icon'=>'fa fa-address-book',
                    'href'=>'https://www.baidu.com',
                    'target'=>'_self',
                    'child'=>[
                        'title'=>'主页模板',
                        'icon'=>'fa fa-tachometer',
                        'href'=>'https://www.baidu.com',
                        'target'=>'_self',
                        'child'=>[
                            'title'=>'主页1',
                            'icon'=>'fa fa-tachometer',
                            'href'=>'https://www.baidu.com',
                            'target'=>'_self'
                        ]
                    ]
                ],
            ]
        ];
//        debugbar()->info($arr);
        return view('admin.index')->with('json', $arr);
    }

    public function welcome()
    {
        $arr = [
            'homeInfo'=>[
                'title'=>'首页',
                'href'=>'href'
            ],
            'logoInfo'=>[
                'title'=>'LAYUI MINI',
                'image'=>'images/logo.png',
                'href'=>'https://www.baidu.com'
            ],
            'menuInfo'=>[
                [
                    'title'=>'常规管理',
                    'icon'=>'fa fa-address-book',
                    'href'=>'https://www.baidu.com',
                    'target'=>'_self',
                    'child'=>[
                        [
                            'title'=>'主页模板',
                            'icon'=>'fa fa-tachometer',
                            'href'=>'',
                            'target'=>'_self',
                            'child'=>[
                                [
                                    'title'=>'主页1',
                                    'icon'=>'fa fa-tachometer',
                                    'href'=>'https://www.baidu.com',
                                    'target'=>'_self'
                                ],
                                [
                                    'title'=>'主页2',
                                    'icon'=>'fa fa-tachometer',
                                    'href'=>'https://www.mm.com',
                                    'target'=>'_self'
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'title'=>'测试管理',
                    'icon'=>'fa fa-address-book',
                    'href'=>'https://www.baidu.com',
                    'target'=>'_self',
                    'child'=>[
                        [
                            'title'=>'主页模板',
                            'icon'=>'fa fa-tachometer',
                            'href'=>'https://www.baidu.com',
                            'target'=>'_self',
                            'child'=>[
                                [
                                    'title'=>'主页1',
                                    'icon'=>'fa fa-tachometer',
                                    'href'=>'https://www.baidu.com',
                                    'target'=>'_self'
                                ]
                            ]
                        ]
                    ]
                ],
            ]
        ];
//        dd($arr);
        return json_encode($arr);
//        response()->json($arr);
//        return view('admin.index')->with('json', $arr);
    }

}