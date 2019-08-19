<?php

namespace App\Http\Controllers;

use App\Models\Weekday;
use Illuminate\Http\Request;

class WeekdayController extends Controller
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
        return view('admin.weekdays.create');
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
        $weekday = new Weekday();
        $weekday->fill($form)->save();
        return redirect('admin')->with('success_msg', '【活動曜日】' . $form['weekday'] . 'を追加しました');
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
    public function update(Request $request, Weekday $weekday)
    {
        $form = $request->all();
        unset($form['_token']);
        $weekday->fill($form)->save();
        return redirect('admin')->with('success_msg', '【活動曜日】' . $form['weekday'] . 'を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weekday $weekday)
    {
        $weekday->delete();
        return redirect('admin')->with('success_msg', '【活動曜日】' . $weekday->weekday . 'を削除しました');
    }
}
