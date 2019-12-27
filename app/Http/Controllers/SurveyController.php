<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Variant;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            "title"=>"required",
            "number"=>["required","numeric"]
        ]);
        $survey=auth()->user()->surveys()->create($data);
        $data=(int)$data["number"];
        return view('question.create',compact('data','survey'));
    }

    public function show(Survey $survey)
    {
        return view('survey.show',compact('survey'));
    }

    public function update(Request $request,Survey $survey)
    {
        $survey->count++;
        $survey->save();
        foreach($survey->questions as $question)
        {
            $data=$request->validate([
                "val$question->id"=>"required"
            ]);
            $variant=Variant::find($data)->first();
            $variant->count++;
            $variant->save();
        }
        return redirect("/");
    }
}
