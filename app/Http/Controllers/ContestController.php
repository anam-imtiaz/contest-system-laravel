<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\Http\Requests\ContestRequest;
use App\Models\ContestQuestions;
use App\Models\ContestQuestionOptions;
use Exception;
class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $page = $request->page;
        $per_page = $request->per_page;
        $sort_field = isset($request->sort_field)?$request->sort_field:'id';
        $sort_order = isset($request->sort_order)?$request->sort_order:'asc';
        $objContest = Contest::orderBy($sort_field, $sort_order)->paginate($per_page);
        return response()->json([
            'data'=>$objContest->items(),
            'total'=>$objContest->total(),
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objContest = Contest::all();
        return response()->json($objContest);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContestRequest $request)
    {
        try {
            $objContest = new Contest();
            $objContest->title = $request->title;
            $objContest->description = $request->description;
            $objContest->start_date = $request->start_date;
            $objContest->end_date = $request->end_date;
            $objContest->score = $request->score;
            $objContest->prize = $request->prize;
            $objContest->save();

            
        return response()->json([
            'data'=>$objContest,
            'message'=>'Contest Added Successfully',
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $objContest = Contest::find($id);
        return response()->json($objContest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $objContest = Contest::find($id);
        return response()->json($objContest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContestRequest $request, string $id)
    {
        try {
            $objContest = Contest::find($id);
            $objContest->title = $request->title;
            $objContest->description = $request->description;
            $objContest->start_date = $request->start_date;
            $objContest->end_date = $request->end_date;
            $objContest->score = $request->score;
            $objContest->prize = $request->prize;
            $objContest->save();
        return response()->json([
            'data'=>$objContest,
            'message'=>'Contest Updated Successfully',
        ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContestRequest $request, string $id)
    {
        try {
            $objContest = Contest::find($id);
            $objContest->delete();
            return response()->json($objContest);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
