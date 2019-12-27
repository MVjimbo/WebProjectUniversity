<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $survey=$request->validate([
            "survey"=>"required"
        ]);
        $survey=Survey::find($survey)->first();
        $num=$survey->number;
        for($i=1;$i<=$num;$i++)
        {
            $data=$request->validate([
                "question$i"=>"required",
                "vars$i"=>"required"
            ]);
            $question=$survey->questions()->create(["value"=>$data["question$i"]]);
            $vals=explode("\r\n",$data["vars$i"]);
            foreach($vals as $val) {
                $result=$question->variants()->create(["value" => $val]);
            }
        }
        return redirect('/');
    }
}
