<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Register;
use App\Models\FAQ;
use Hash;
use Session;
use App\Models\Portfolio;
use App\Models\Career;
use Mail;

class FrontController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $getData = Portfolio::orderBy('id', 'desc')->where('status',1)->take(5)->get();
        return view('index',compact('getData'));
    }
    public function about()
    {
        return view('about');
    }
    public function service()
    {
        return view('service');
    }
    public function portfolio()
    {
        $getData = Portfolio::orderBy('id', 'desc')->where('status',1)->get();
        return view('portfolio',compact('getData'));
    }
    public function career()
    {
        return view('career');
    }
    public function contact()
    {
        return view('contact');
    }
    public function signin()
    {
        return view('signin');
    }
    public function register(Request $request)
    {
        $request->validate([
            'fullname'=> 'required',
            'email'=>'required|unique:register',
            'password'=>'required',
            'phone'=>'required',
            'gender'=>'required'
        ]);

        $addData = new Register();
        $addData->fullname=$request->fullname;
        $addData->email=$request->email;
        $addData->password=Hash::make($request->password);
        $addData->phone=$request->phone;
        $addData->gender=$request->gender;
        
        $addData->save();

       return back()->with('success', 'Register Successfully');
    }
    
    public function addcontact(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'message'=>'required'
        ]);

       
        $addData = new Contact();
        $addData->name=$request->name;
        $addData->email=$request->email;
        $addData->country=$request->country;
        $addData->state=$request->state;
        $addData->city=$request->city;
        $addData->subject =$request->subject;
        $addData->message=$request->message;
       
        $addData->save();

       return back()->with('success', 'Contact Detail Save Successfully');        
    }
    
    public function project()
    {
        $getData=Project::where('status',1)->orderBy('id','DESC')->get();
        return view('project',compact('getData'));
    }
    public function projectDetail($id)
    {
        $pid=$id;
        $getData=Project::where('status',1)->where('id',$id)->first();
        $latestData = Project::where('id','!=',$getData->id)->latest()->take(4)->get();
        $faqData=FAQ::where('status',1)->where('answer','!=',null)->get();
        return view('project_detail',compact('getData','latestData','pid','faqData'));
    }  
    public function userlogin(Request $request)
    {
        $getData=Register::where('email',$request->email)->first();
        if (Hash::check($request->password, $getData->password)) 
        {
            Session::put('userdata', $getData);
            return redirect()->route('index')->with('success','Login successfully');
        }
        else{
            return redirect()->route('index')->with('error','Something Wrong.!!');
        }
    }  
    public function userlogout()
    {
        Session::forget('userdata');
        return redirect()->route('index');
    }
    public function addfaq(Request $request)
    {
        $request->validate([
            'question'=>'required'
        ]);

        $addData = new FAQ();
        $addData->pid=$request->pid;
        $addData->uid=$request->uid;
        $addData->question=$request->question;
       
        $addData->save();

        return back()->with('success', 'Your Query Will be Submited');
    }
    public function addcareer(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'c_salary'=>'required',
            'e_salary'=>'required',
            'reason'=>'required',
            'upload' => 'required|mimes:pdf|max:2048',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'extra'=>'required'
        ]);

        $fileName = time().'.'.$request->upload->extension(); 
   
        $request->upload->move(public_path('career'), $fileName);

        $addData = new Career();
        $addData->name=$request->fullname;
        $addData->email=$request->email;
        $addData->education=$request->education;
        $addData->experience=$request->experience;
        $addData->c_salary=$request->c_salary;
        $addData->e_salary=$request->e_salary;
        $addData->reason=$request->reason;
        $addData->upload = $fileName;
        $addData->country=$request->country;
        $addData->state=$request->state;
        $addData->city=$request->city;
        $addData->extra=$request->extra;
       
        $addData->save();

        $subject = "Career Mail";
        $Email= $request->email;
        $html= "Thank you.";

        $data_mail = array('subject'=>$subject,'email'=>$Email,'html'=>$html);

        Mail::send(array(), $data_mail, function($message) use ($data_mail) {
            $message->to($data_mail['email'])->subject($data_mail['subject']);
            //$message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            $message->setBody($data_mail['html'], 'text/html');
        });

        return back()->with('success', 'Form Will be Submited');
    }

    public function cart()
    {
        return view('cart');
    }
}
