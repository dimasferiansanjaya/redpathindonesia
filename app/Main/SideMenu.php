<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard',
                'title' => 'Dashboard'
            ],
            'training' => [
                'icon' => 'trello',
                'title' => 'Training',
                'sub_menu' => [
                    'training-history' => [
                        'icon' => 'rewind',
                        'route_name' => 'training-history',
                        'title' => 'Training History'
                    ],
                    'training-reminder' => [
                        'icon' => 'clock',
                        // 'route_name' => '',
                        'title' => 'Training Reminder'
                    ]
                ]
            ],
            'employee' => [
                    'icon' => 'users',
                    'title' => 'Employee',
                    'sub_menu' => [
                        'add-new-employee' => [
                            'icon' => 'user-plus',
                            'title' => 'Add New'
                        ],
                        'manage-employee' => [
                            'icon' => 'layers',
                            'title' => 'List'
                        ],
                    ]
                    ]
        ];
    }
}
