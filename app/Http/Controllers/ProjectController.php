<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;

class ProjectController extends Controller
{

//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects/create');
    }

    public function allProjects()
    {
        $p = Project::paginate(8);

        return view('projects/view',  ['projects' => $p], ['status' => 'Всички']);
    }

    public function view($slug)
    {
        $project = Project::where('slug', '=', $slug)->first();

        if (is_null($project))
        {
            flash('Този проект не съшествува!')->error();
            return view('errors/404');
        }

        return view('projects/view_project', ['project' => $project]);
    }

    public function viewCompleted()
    {
        $completedProjects = Project::where('is_completed', '!=', '0')->paginate(8);

        return view('projects/view', ['projects' => $completedProjects], ['status' => 'Завършени']);
    }


    public function viewCurrent()
    {
        $completedProjects = Project::where('is_completed', '=', '0')->paginate(8);

        return view('projects/view', ['projects' => $completedProjects], ['status' => 'Текущи']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->fill(Input::all());
        $project->save();

        return redirect('projects/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        return view('projects/view_project', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $project = Project::find($id);
//        return view('projects/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $project = Project::find($id);
//        $project->fill(Input::all());
//
//        $banner = Input::file('banner');
//        $poster = Input::file('poster');
//        $bannersPath = 'images/banners/';
//        $postersPath = 'images/posters/';
//
//        if (Input::hasFile('banner') && $banner->isValid())
//        {
//            $uniqueName = md5(uniqid() . $project->name) . "." . $banner->getClientOriginalExtension();
//            $banner->move($bannersPath, $uniqueName);
//            $project->banner = '/' . $bannersPath . $uniqueName;
//        }
//
//        if (Input::hasFile('poster') && $poster->isValid())
//        {
//            $uniqueName = md5(uniqid() . $project->name) . "." . $banner->getClientOriginalExtension();
//            $poster->move($postersPath, $uniqueName);
//            $project->poster = '/' . $postersPath . $uniqueName;
//        }
//
//        $project->save();
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
