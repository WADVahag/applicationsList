<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Status;

use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\ApplicationUpdateRequest;

use App\Services\FileService;

class ApplicationController extends Controller
{
    public function __construct(){
        $this->fileService = new FileService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return datatables()->eloquent(Application::query())->only(["name", "created_at", "finish_date", "status"])->with("status")->toJson();
        $applications = Application::with("status")->get();
        return datatables()->of($applications)->only(["name", "created_at", "finish_date", "status", "actions"])->editColumn("status", function($application){
            return $application->status->name;
        })->addColumn("actions", function($application){
            return view("parts.form-buttons")->with(compact("application"));
        })->rawColumns(["actions"])->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();

        return view('appPages.create')->with(compact("statuses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ApplicationStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationStoreRequest $request)
    {
        $filename = $this->fileService->storeFileGetUrl($request, "image", "images");
      
        $data = $request->all();

        $data["image"] = $filename;

        $application = Application::create($data);

        return back()->withSuccess("Application created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $application->load("status");

        return view("appPages.show")->with(compact("application"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $statuses = Status::all();

        return view('appPages.edit')->with(compact("statuses", "application"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ApplicationUpdateRequest  $request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationUpdateRequest $request, Application $application)
    { 
        $data = $request->all();

        if($request->hasFile("image")){
            $this->fileService->deleteFile("images/{$application->image}");
            $filename = $this->fileService->storeFileGetUrl($request, "image", "images");
            $data["image"] = $filename;
        }

        $application->update($data);

        return back()->withSuccess("Application updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
