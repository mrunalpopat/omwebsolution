<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Register;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Portfolio;
use App\Models\Career;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    public function addproject()
    {
        return view('admin.addproject');
    }
    public function createproject(Request $request)
    {
        $request->validate([
            'project_name'=> 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'project_desc'=>'required',
            'images.*' => 'required|mimes:jpeg,jpg,png|max:2048',
            'project_price'=>'required|integer',
            'technology'=>'required',
            'can_be_used'=>'required',
            'modules'=>'required'
        ]);

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);  
                $imgData[] = $name;  
            }
        }

        $addData = new Project();
        $addData->name=$request->project_name;
        $addData->description=$request->project_desc;
        $addData->technology=$request->technology;
        $addData->can_be_used=$request->can_be_used;
        $addData->modules=$request->modules;
        $addData->images = json_encode($imgData);
        $addData->price=$request->project_price;
        $addData->status=$request->project_status;
       
        $addData->save();

       return back()->with('success', 'Project Detail Added successfully');
    }
    public function projectlist()
    {
        $getData = Project::orderBy('id', 'desc')->get();
        return view('admin.listproject',compact('getData'));
    }
    public function editproject($id)
    {
        $getData=Project::where('id',$id)->first();
        return view('admin.editproject',compact('getData'));
    }
    public function updateproject(Request $request)
    {
        $request->validate([
            'project_name'=> 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'project_desc'=>'required',
            'images.*' => 'required|mimes:jpeg,jpg,png|max:2048',
            'project_price'=>'required|integer',
            'technology'=>'required',
            'can_be_used'=>'required',
            'modules'=>'required'
        ]);

        $getImage = Project::where('id',$request->pid)->first();

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);  
                $imgData[] = json_encode($name);  
            }
        }
        else{
            $imgData=$getImage->images;
        }

        $project = Project::find($request->pid);
        $project->update([
            'name' => $request->project_name,
            'description' => $request->project_desc,
            'images'=>$imgData,
            'price'=>$request->project_price,
            'status'=>$request->project_status,
            'technology'=>$request->technology,
            'can_be_used'=>$request->can_be_used,
            'modules'=>$request->modules
        ]);
       
        return redirect()->route('projectlist')->with('success','Project updated successfully');
    }
    public function deleteproject($id)
    {
        $project=Project::find($id);
        $project->delete();

        return redirect()->route('projectlist')->with('success','Project delete successfully');
    }
    public function userlist()
    {
        $getData = Register::orderBy('id', 'desc')->get();
        return view('admin.listusers',compact('getData'));
    }
    public function deleteusers($id)
    {
        $project=Register::find($id);
        $project->delete();

        return redirect()->route('userlist')->with('success','User delete successfully');
    }
    public function editusers($id)
    {
        $getData=Register::where('id',$id)->first();
        return view('admin.editusers',compact('getData'));
    }
    public function updateusers(Request $request)
    {
        $request->validate([
            'fullname'=> 'required',
            'phone'=>'required',
            'gender'=>'required'
        ]);

        $userData = Register::find($request->pid);
        $userData->update([
            'fullname' => $request->fullname,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'status'=>$request->status
        ]);
       
        return redirect()->route('userlist')->with('success','User detail updated successfully');
    }
    public function contactlist()
    {
        $getData = Contact::orderBy('id', 'desc')->get();
        return view('admin.listcontact',compact('getData'));
    }
    public function faqlist()
    {
        $getData=FAQ::get();
        return view('admin.pendingfaq',compact('getData'));
    }  
    public function editfaq($id)
    {
        $getData=FAQ::where('id',$id)->first();
        return view('admin.editfaq',compact('getData'));
    }  
    public function updatefaq(Request $request)
    {
        $request->validate([
            'question'=> 'required',
            'answer'=>'required'
        ]);

        $userData = FAQ::find($request->fid);
        $userData->update([
            'question' => $request->question,
            'answer'=>$request->answer,
            'status'=>$request->status
        ]);
       
       return back()->with('success', 'Question / Answer updated successfully');
        //return redirect()->route('faqlist')->with('success','');
    }

    public function addportfolio()
    {
        return view('admin.addportfolio');
    }
    public function portfoliolist()
    {
        $getData = Portfolio::orderBy('id', 'desc')->get();
        return view('admin.listportfolio',compact('getData'));
    }
    public function createportfolio(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'type'=>'required',
            'images.*' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/portfolio/', $name);  
                $imgData= $name;  
            }
        }

        $addData = new Portfolio();
        $addData->title=$request->title;
        $addData->images=$imgData;
        $addData->type=$request->type;
        $addData->status=$request->status;
       
        $addData->save();

       return back()->with('success', 'Portfolio Added successfully');
    }
    public function editportfolio($id)
    {
        $getData=Portfolio::where('id',$id)->first();
        return view('admin.editportfolio',compact('getData'));
    }
    public function updateportfolio(Request $request)
    {
        //echo "<pre>";print_r($request->all()); exit;
        $request->validate([
            'title'=> 'required',
            'type'=>'required',
            'images.*' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $getImage = Portfolio::where('id',$request->id)->first();

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/portfolio/', $name);  
                $imgData = $name;  
            }
        }
        else{
            $imgData=$getImage->images;
        }

        $project = Portfolio::find($request->id);
        
        $project->update([
            'title' => $request->title,
            'images'=>$imgData,
            'type'=>$request->type,
            'status'=>$request->status
        ]);
        
       
        return redirect()->route('portfoliolist')->with('success','Portfolio updated successfully');
    }
    public function deleteportfolio($id)
    {
        $project=Portfolio::find($id);
        $project->delete();

        return redirect()->route('portfoliolist')->with('success','Portfolio delete successfully');
    }
    public function careerlist()
    {
        $getData = Career::orderBy('id', 'desc')->get();
        return view('admin.listcareer',compact('getData'));
    }
    
}
