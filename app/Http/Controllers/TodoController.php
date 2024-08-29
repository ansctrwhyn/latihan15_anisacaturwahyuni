<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return response()->json(
            [
                "data" => $todos,
                "message" => "Sukses",
                "total_todo" => count($todos)
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json([
            "data" => $todo
        ], 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
        return response()->json($todo, 200);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(["message", "Todo not found"], 404);
        }
        $todo->update($request->all());
        return response()->json($todo, 200);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(["message", "Todo not found"], 404);
        }
        $todo->delete();
        return response()->json([
            "message" => "Todo berhasil dihapus"
        ], 200);
    }


}
