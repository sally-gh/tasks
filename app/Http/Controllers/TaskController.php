<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        // $tasks = DB::table('tasks')->where('name', 'like', 'Task 1%')->get();

        $tasks = DB::table('tasks')
        ->orderBy('name', 'asc')
        ->get();

        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'name' => $request -> name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return 'Store';
    }

    public function delete($id)
    {
        DB::table('tasks')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        DB::table('tasks')->where('name', $request->name)->update([
        'name' => $request -> name
    ]);
    return ('Data Updated');
}

}