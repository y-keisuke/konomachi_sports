<?php

namespace App\Http\Controllers;

use App\Models\Frequency;
use Illuminate\Http\Request;

class FrequencyController extends Controller
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
        return view('admin.frequencies.create');
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
        $frequency = new Frequency();
        $frequency->fill($form)->save();
        return redirect('admin')->with('success_msg', '【活動頻度】' . $form['frequency'] . 'を追加しました');
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
    public function update(Request $request, Frequency $frequency)
    {
        $form = $request->all();
        unset($form['_token']);
        $frequency->fill($form)->save();
        return redirect('admin')->with('success_msg', '【活動頻度】' . $form['frequency'] . 'を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frequency $frequency)
    {
        $frequency->delete();
        return redirect('admin')->with('success_msg', '【活動頻度】' . $frequency->frequency . 'を削除しました');
    }
}
