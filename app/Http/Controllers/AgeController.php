<?php

namespace App\Http\Controllers;

use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $age = new Age();
        $age->fill($form)->save();
        return redirect('admin')->with('success_msg', '【年齢層】' . $form['age'] . 'を追加しました');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Age $age)
    {
        $form = $request->all();
        unset($form['_token']);
        $age->fill($form)->save();
        return redirect('admin')->with('success_msg', '【年齢層】' . $form['age'] . 'を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Age $age)
    {
        $age->delete();
        return redirect('admin')->with('success_msg', '【年齢層】' . $age->age . 'を削除しました');
    }
}
