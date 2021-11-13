<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProcedureResource;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaterkitController extends Controller
{
    public function test()
    {
        $summary = DB::table('procedures')
                ->select(DB::raw('count(*) as procedure_count, status'))
                ->groupBy('status')
                ->get();
        return response()->json($summary);
    }

    public function procedures()
    {
        $procedures = DB::table('procedures')->latest()->get();
        return ProcedureResource::collection($procedures);
    }

    // home
    public function home()
    {
        $pageConfigs = ['pageHeader' => false];
        
        return view('/content/home', compact('pageConfigs'));
    }

    public function sop_management()
    {
        $pageConfigs = ['pageHeader' => false];

        $submitted = Procedure::where('status', 1)->count();
        $ureview = Procedure::where('status', 2)->count();
        $wra = Procedure::where('status', 3)->count();
        $completed = Procedure::where('status', 4)->count();
        
        
        return view('/content/sop-management', compact('pageConfigs', 'submitted', 'ureview', 'wra', 'completed'));
    }

    // Layout collapsed menu
    public function collapsed_menu()
    {
        $pageConfigs = ['sidebarCollapsed' => true];
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        return view('/content/layout-collapsed-menu', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // layout boxed
    public function layout_full()
    {
        $pageConfigs = ['layoutWidth' => 'full'];

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Layouts"], ['name' => "Layout Full"]
        ];
        return view('/content/layout-full', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    // without menu
    public function without_menu()
    {
        $pageConfigs = ['showMenu' => false];
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout without menu"]
        ];
        return view('/content/layout-without-menu', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
    }

    // Empty Layout
    public function layout_empty()
    {
        $breadcrumbs = [['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout Empty"]];
        return view('/content/layout-empty', ['breadcrumbs' => $breadcrumbs]);
    }
    // Blank Layout
    public function layout_blank()
    {
        $pageConfigs = ['blankPage' => true];
        return view('/content/layout-blank', ['pageConfigs' => $pageConfigs]);
    }
}
