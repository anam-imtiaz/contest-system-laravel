<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContestQuestions;
use App\Http\Requests\ContestQuestionRequest;
use App\Models\ContestQuestionOptions;

class ContestQuestionController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        $per_page = $request->per_page;
        $contest_id = $request->contest_id;
        $sort_field = isset($request->sort_field)?$request->sort_field:'id';
        $sort_order = isset($request->sort_order)?$request->sort_order:'asc';
        $objContestQuestion = ContestQuestions::orderBy($sort_field, $sort_order)->where('contest_id', $contest_id)->paginate($per_page);
        return response()->json([
            'data'=>$objContestQuestion->items(),
            'total'=>$objContestQuestion->total(),
           
        ]);
    }

    public function store(ContestQuestionRequest $request)
    {
       
        $objContestQuestion = new ContestQuestions();
        $objContestQuestion->contest_id = $request->contest_id;
        $objContestQuestion->question = $request->question;
        $objContestQuestion->question_type = $request->question_type;
        $objContestQuestion->answer = $request->answer;
        $objContestQuestion->save();

        $question_id = $objContestQuestion->id;
        $question_options = explode(',',$request->question_options);
        foreach ($question_options as $key => $value) {
            $objContestQuestionOption = new ContestQuestionOptions();
            $objContestQuestionOption->contest_question_id = $question_id;
            $objContestQuestionOption->option = $value;
            $objContestQuestionOption->save();
        }
        return response()->json([
            'data'=>$objContestQuestion,
            'message'=>'Contest Question Added Successfully',
        ]);
    }

    public function show($id)
    {
        $objContestQuestion = ContestQuestions::find($id);
        return response()->json([
            'data'=>$objContestQuestion,
        ]);
    }

    public function update($id, ContestQuestionRequest $request)
    {
        $objContestQuestion = ContestQuestions::find($id);
        $objContestQuestion->contest_id = $request->contest_id;
        $objContestQuestion->question = $request->question;
        $objContestQuestion->question_type = $request->question_type;
        $objContestQuestion->answer = $request->answer;
        $objContestQuestion->question_score = $request->question_score;
        $objContestQuestion->save();

        $question_id = $id;
        $question_options = explode(',',$request->question_options);
        ContestQuestionOptions::where('contest_question_id', $question_id)->delete();
        foreach ($question_options as $key => $value) {
            $objContestQuestionOption = new ContestQuestionOptions();
            $objContestQuestionOption->contest_question_id = $question_id;
            $objContestQuestionOption->option = $value;
            $objContestQuestionOption->save();
        }
        return response()->json([
            'data'=>$objContestQuestion,
            'message'=>'Contest Question Updated Successfully',
        ]);
    }   

    public function destroy($id)
    {
        $objContestQuestion = ContestQuestions::find($id);
        $objContestQuestion->delete();
        return response()->json([
            'message'=>'Contest Question Deleted Successfully',
        ]);
    }
}
