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
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
                ],
            'training' => [
                'icon' => 'target',
                'title' => 'Training',
                'sub_menu' => [
                    'training-history' => [
                        'icon' => 'rewind',
                        'route_name' => 'training-history',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Training History'
                    ],
                    'training-reminder' => [
                        'icon' => 'clock',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Training Reminder'
                    ],
                ]
                ]

        ];
    }
}
