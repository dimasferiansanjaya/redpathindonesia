<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TrainingImport;
use App\Jobs\ImportTrainingHistory;
use App\Jobs\NotifyImportTrainingHistoryCompleted;
use App\Models\Training;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Builder\Trait_;

class TrainingController extends Controller
{
    public function index()
    {
        return view('pages.training.training-history');
    }

    public function importCSV(Request $request)
    {
        $customMessages = [
            'training-history.required' => 'No file selected. Please select at least one file.',
            'training-history.mimes' => 'The selected file must be a file of type: csv. '
        ];
        $request->validate([
            'training-history' => ['required', 'mimes:csv']
        ], $customMessages);

        if ($request->file('training-history')) {
            $file = $request->file('training-history');
            $file->move(storage_path().'/_imports', $id = uniqid());
            $filePath = storage_path().'/_imports/'.$id;
            Excel::queueImport(new TrainingImport($filePath), $filePath,null, \Maatwebsite\Excel\Excel::CSV);
            (new TrainingImport($filePath))->queue($filePath.'.csv')->chain([
                new NotifyImportTrainingHistoryCompleted($filePath)
            ]);           
        }
        return back()->with('success', 'Data imported successfully.');
    }

    public function deleteAll()
    {
        Training::truncate();
        return back()->with('success', 'All data deleted successfully.');
    }

    public function show()
    {
        $trainingHistory = number_format(Training::count());
        $lastUpdateData = Training::orderBy('course_end', 'desc')->first()->course_end;
        return view('pages.training.import', compact([
            'trainingHistory', 'lastUpdateData'
        ]));
    }
}
