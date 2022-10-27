@extends('../layout/' . $layout)

@section('subhead')
    <title>Training History</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Training History</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- BEGIN: Vertical Form -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Import Data</h2>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                        <button data-tw-toggle="modal" data-tw-target="#delete-modal" class="text-danger" id="deleteAll">
                            <i data-lucide="trash-2" class="block mx-auto"></i>
                        </button>
                    </div>
                </div>
                <div id="vertical-form" class="p-5">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-outline-success show flex items-center mb-4 py-2" role="alert">
                            <i class="w-6 h-6 mr-2 text-success" data-lucide="check-circle"></i> {{ $message }}
                        </div>
                    @endif
                    @error('training-history')
                        <div class="alert alert-outline-danger show flex items-center mb-4 py-2" role="alert">
                            <i class="w-6 h-6 mr-2 text-danger" data-lucide="alert-triangle"></i> {{ $message }}
                        </div>
                    @enderror
                    <form class="" action="{{ route('training-history') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="block">
                            <span class="sr-only">Choose file</span>
                            <input
                                class="w-full text-sm text-slate-500
                            file:mr-5 file:py-2 file:px-6
                            file:rounded-full file:border-0
                            file:text-sm file:font-medium
                            file:bg-primary/5 file:text-primary
                            hover:file:cursor-pointer hover:file:bg-primary/10
                            hover:file:text-primary
                          "
                                id="training-history" name="training-history" type="file">
                        </label>
                        <button type="submit" class="w-full btn btn-primary mt-5">Import</button>
                    </form>
                </div>
            </div>
            <!-- END: Vertical Form -->
        </div>
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                            be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="{{ route('training-history-delete') }}" method="GET">
                            @csrf
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->
@endsection
