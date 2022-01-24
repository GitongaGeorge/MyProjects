<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Sensor;
use App\Log;
use App\Control;
use App\User;
use App\Task;
use App\Tarehe;
use App\Stage;
use DB;

class ApiController extends Controller
{
    public function savevalues(Request $request)
    {
        $sunlight=$request->input('sunlight');
        $temperature=$request->input('temperature');
        $humidity=$request->input('humidity');
        $rain=$request->input('rain');
        $soil=$request->input('soil');
        //Prediction
        switch (true) {
            case $sunlight <= 20:
                $sunlightoutcome = 'low sunlight';
                break;

            case $sunlight <= 40:
                $sunlightoutcome = 'medium sunlight';
                break;

            case $sunlight <= 60:
                $sunlightoutcome = 'semi high sunlight';
                break;

            case $sunlight <=80:
                $sunlightoutcome = 'high sunlight';
                break;

            default:
                $sunlightoutcome = 'extreme sunlight';
                break;
        }

        switch (true) {
            case $temperature <= 17:
                $temperatureout = 'low temperature';
                break;

            case $temperature <= 23:
                $temperatureout = 'medium temperature';
                break;

            case $temperature <= 31:
                $temperatureout = 'normal temperature';
                break;

            case $temperature <=36:
                $temperatureout = 'high temperature';
                break;

            default:
                $temperatureout = 'extreme temperature';
                break;
        }

        switch (true) {
            case $humidity <= 20:
                $humidityout = 'low humidity';
                break;

            case $humidity <= 40:
                $humidityout = 'medium humidity';
                break;

            case $humidity <= 60:
                $humidityout = 'high humidity';
                break;

            case $humidity <=80:
                $humidityout = 'high humidity';
                break;

            default:
                $humidityout = 'extreme';
                break;
        }

        switch (true) {
            case $soil <= 20:
                $soilout = 'low moisture';
                break;

            case $soil <= 40:
                $soilout = 'medium humidity';
                break;

            case $soil <= 60:
                $soilout = 'normal';
                break;

            case $soil <=80:
                $soilout = 'high moisture';
                break;

            default:
                $soilout = 'extreme ';
                break;
        }

        switch (true) {
            case $rain <= 20:
                $rainout = 'no rain';
                break;

            case $rain <= 40:
                $rainout = 'light showers';
                break;

            case $rain <= 60:
                $rainout = 'medium rain';
                break;

            case $rain <=80:
                $rainout = 'high rainfall';
                break;

            default:
                $rainout = 'high rainfall';
                break;
        }

        $sun=new Sensor;
        $sun->sensor="sunlight";
        $sun->value=$sunlight;
        $sun->outcome=$sunlightoutcome;
        $sun->save();

        $so=new Sensor;
        $so->sensor="soil";
        $so->value=$soil;
        $so->outcome=$soilout;
        $so->save();

        $rainfall=new Sensor;
        $rainfall->sensor="rain";
        $rainfall->value=$rain;
        $rainfall->outcome=$rainout;
        $rainfall->save();

        $hum=new Sensor;
        $hum->sensor="humidity";
        $hum->value=$humidity;
        $hum->outcome=$humidityout;
        $hum->save();

        $temp=new Sensor;
        $temp->sensor="temperature";
        $temp->value=$temperature;
        $temp->outcome=$temperatureout;
        $temp->save();

        $log=new Log;
        $log->description="Saved sensor Values";
        $log->save();

        return response()->json([
            "status"=>"1",
            "message"=>"Saved Successfully"
        ]);

    }

    public function savelogs(Request $request)
    {
        $description=$request->input('description');
        $log=new Log;
        $log->description=$description;
        $log->save();
        return response()->json([
            "status"=>"1",
            "message"=>"Saved Successfully"
        ]);
    }

    public function getcontrols()
    {
      $controls=Control::select('device','status')->get();
      return json_encode($controls);
    }

    //Change Later
    public function updatepump(Request $request)
    {
        $pump=$request->input('pump');
        Control::where('device','=',"pump")->update(["status"=>$pump]);
        $log=new Log;
        $log->description="PUMP ".$pump;
        $log->save();
        return response()->json([
            "status"=>"1",
            "message"=>"Saved Successfully"
        ]);
    }

    public function updateled(Request $request)
    {
        $led=$request->input('led');
        Control::where('device','=',"led")->update(["status"=>$led]);
        $log=new Log;
        $log->description="LED ".$led;
        $log->save();
        return response()->json([
            "status"=>"1",
            "message"=>"Saved Successfully"
        ]);
    }

    public function gettemperature()
    {
      $data=Sensor::where('sensor','temperature')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function getsunlight()
    {
      $data=Sensor::where('sensor','sunlight')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function getsoil()
    {
      $data=Sensor::where('sensor','soil')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function getrain()
    {
      $data=Sensor::where('sensor','rain')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function gethumidity()
    {
      $data=Sensor::where('sensor','humidity')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function getallsensors()
    {
      $data=Sensor::where('sensor','sunlight')->limit(100)->orderBy('id','desc')->get();
      return response()->json([
        "status"=>'1',
        "data"=>$data
      ]);
    }

    public function login(Request $request)
    {
      $email=$request->input('email');
      $password=$request->input('password');
      $new=User::where('email',$email)->get()->first();
      if(Hash::check($password,$new->password))
      {
        $username=($new->fname)." ".($new->lname);
        $userid=$new->id;
        return response()->json([
          "status"=>"1",
          "username"=>$username,
          "userid"=>$userid,
          "email"=>$email
        ]);
      }
      else {
        return response()->json([
          "status"=>"2",
          "message"=>"Check your Username or Password "
        ]);
      }
    }
    //
    public function setfarmingdate(Request $request)
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
      return response()->json([
        "status"=>"1",
        "data"=>"Changed farming date to ".$date
      ]);
    }

    public function getallstages()
    {
      $data=DB::table('stages')
      ->select('stages.name','stages.description','stages.recommended','tarehes.date')
      ->join('tarehes','tarehes.stage','=','stages.name')
      ->get();
      return response()->json([
        "status"=>"1",
        "data"=>$data
      ]);
    }

    public function taskpage()
    {
      $data=Task::where('done','Not Done')->orderBy('duedate','asc')->limit(1)->get()->first();
      $data2=Task::where('done','Not Done')->get();
      return response()->json([
        "Data"=>$data->name,
        "Date"=>$data->duedate,
        "Done"=>$data2
      ]);
    }

    public function homepage()
    {
      $data=Task::where('done','Not Done')->orderBy('duedate','asc')->limit(1)->get()->first();
      $date=Tarehe::where('stage','R6')->get()->first();
      $today=date('Y-m-d');
      $stage=Tarehe::where('date','<',$today)->orderBy('date','desc')->limit(1)->value('stage');
      $now = time();
      $your_date = strtotime($date->date);
      $datediff = abs($now - $your_date);
      $actual= round($datediff / (60 * 60 * 24));
      return response()->json([
        "diff"=>$actual,
        "data"=>$data->name,
        "date"=>$data->duedate,
        "stage"=>$stage
      ]);
    }

    public function datepage()
    {
      $today=date('Y-m-d');
      $stage=Tarehe::where('date','<',$today)->orderBy('date','desc')->limit(1)->value('stage');
      $description=Stage::where('name',$stage)->limit(1)->value('description');
      $recom=Stage::where('name',$stage)->limit(1)->value('recommended');
      $data3=DB::table('stages')
        ->select('stages.name','stages.description','stages.recommended','tarehes.date')
        ->join('tarehes','tarehes.stage','=','stages.name')
        ->get();
      return response()->json([
        "stage"=>$stage,
        "descr"=>$description,
        "action"=>$recom,
        "all"=>$data3
      ]);
    }

    public function profilepage(Request $request)
    {
        $id=$request->id;
        $start=Tarehe::where('stage','V0')->select('date')->get()->first();
        $end=Tarehe::where('stage','R6')->select('date')->get()->first();
        return response()->json([
            "start"=>$start->date,
            "end"=>$end->date
            ]);
    }

}
