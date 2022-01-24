<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;
use Kreait\Firebase\Factory;
use App\Task;
use App\Sensor;
use App\Stage;
use App\Tarehe;
use App;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
      if($request->session()->has('status'))
      {
        $name=$request->session()->get('username');
        //$sname=$request->session()->get('lname');
        return view('dashboard', ['username'=>$name]);
      }
      else {
        return redirect()->route('login')->with('error','Please Login first');
      }
    }

    public function farming(Request $request)
    {
      if($request->session()->has('status'))
      {
        //$name=$request->session()->get('fname');
        $data=DB::table('stages')
        ->select('stages.name','stages.description','stages.recommended','tarehes.date')
        ->join('tarehes','tarehes.stage','=','stages.name')
        ->get();
        $sname=$request->session()->get('username');
        return view('farming', ['data'=>$data,'username'=>$sname]);
      }
      else {
        return redirect()->route('login')->with('error','Please Login first');
      }
    }

    public function history(Request $request)
    {
      if($request->session()->has('status'))
      {
        $name=$request->session()->get('username');
        $id=$request->session()->get('id');
        $data=Sensor::where('sensor','soil')->latest("created_at")->limit(15)->get();
        $data1=Sensor::where('sensor','temperature')->latest("created_at")->limit(6)->get();
        $data2=Sensor::where('sensor','sunlight')->latest("created_at")->limit(6)->get();
        $data3=Sensor::where('sensor','humidity')->latest("created_at")->limit(6)->get();
        $data4=Task::where('userid',$id)->where('done','Not Done')->get();
        //$sname=$request->session()->get('lname');
        return view('history', ['username'=>$name,'data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
      }
      else {
        return redirect()->route('login')->with('error','Please Login first');
      }
    }

    public function task(Request $request)
    {
      if($request->session()->has('status'))
      {
        $name=$request->session()->get('username');
        $id=$request->session()->get('id');
        //$sname=$request->session()->get('lname');
        $data=Task::where('userid',$id)->where('done','Not Done')->get();

        $data1=Task::where('userid',$id)->where('done','Done')->get();
        //$data=Task::all();
        return view('task', ['username'=>$name,'data'=>$data,'data1'=>$data1]);
      }
      else {
        return redirect()->route('login')->with('error','Please Login first');
      }
    }

    public function getsunlight()
    {
      $factory = (new Factory)->withServiceAccount(base_path().'/smartfarm-dc194-firebase-adminsdk-s81kz-eeb2099df2.json');
      $database = $factory->createDatabase();
      $reference = $database->getReference('Sensors');
      $snapshot = $reference->getSnapshot();
      $value[0] = $snapshot->getChild("Sunlight")->getValue();
      $value[1] = $snapshot->getChild("Rain")->getValue();
      $value[2] = $snapshot->getChild("Soil")->getValue();
      $value[3] = $snapshot->getChild("Humidity")->getValue();
      $value[4] = $snapshot->getChild("Temperature")->getValue();
      return response()->json(array('msg'=> $value));
    }

    public function savedates(Request $request)
    {
      $date=$request->duedate;
      $temp[0]=$date;
      $temp[1]= date('Y-m-d',strtotime($date."+ 7 days"));
      $temp[2] = date('Y-m-d',strtotime($date."+ 21 days"));
      $temp[3] = date('Y-m-d',strtotime($date."+ 32 days"));
      $temp[4] = date('Y-m-d',strtotime($date."+ 38 days"));
      $temp[5] = date('Y-m-d',strtotime($date."+ 44 days"));
      $temp[6] = date('Y-m-d',strtotime($date."+ 49 days"));
      $temp[7] = date('Y-m-d',strtotime($date."+ 56 days"));
      $temp[8] = date('Y-m-d',strtotime($date."+ 63 days"));
      $temp[9] = date('Y-m-d',strtotime($date."+ 70 days"));
      $temp[10] = date('Y-m-d',strtotime($date."+ 84 days"));
      $temp[11] = date('Y-m-d',strtotime($date."+ 98 days"));
      $temp[12] = date('Y-m-d',strtotime($date."+ 119 days"));
      $temp[13] = date('Y-m-d',strtotime($date."+ 160 days"));
      //Stages
      $des=array("V0", "V2", "V5","V8","V10","V12","V14","VT","R1","R2","R3","R4","R5","R6");
      Tarehe::truncate();
      for ($i=0; $i < sizeof($temp) ; $i++) {
        $tarehe=new Tarehe;
        $tarehe->stage=$des[$i];
        $tarehe->date=$temp[$i];
        $tarehe->save();
      }
      $request->session()->flash('success', 'Date was stored');
      //$data=Tarehe::all();
      $data=DB::table('stages')
      ->select('stages.name','stages.description','stages.recommended','tarehes.date')
      ->join('tarehes','tarehes.stage','=','stages.name')
      ->get();
      return redirect()->route('farming')->with('data',$data);
    }

    public function reportpdf(Request $request)
    {
        $data=Sensor::where('sensor','temperature')->orWhere('sensor','humidity')->latest('created_at')->limit(20)->get();
        $data2=Sensor::where('sensor','sunlight')->orWhere('sensor','rain')->latest('created_at')->limit(20)->get();
        $data4=Sensor::where('sensor','soil')->latest('created_at')->limit(15)->get();
        //$data3=Stage::all();
        $data3=DB::table('stages')
        ->select('stages.name','stages.description','stages.recommended','tarehes.date')
        ->join('tarehes','tarehes.stage','=','stages.name')
        ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('fullreport',['data'=> $data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
        return $pdf->stream();
      //return($data);
    }

    public function report()
    {
      $data=Sensor::where('sensor','temperature')->orWhere('sensor','humidity')->latest('created_at')->limit(20)->get();
      return view('fullreport',['data'=>$data,'data2'=>$data2]);
      //return($data);
    }

}
