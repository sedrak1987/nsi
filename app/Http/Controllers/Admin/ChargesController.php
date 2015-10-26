<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Charge;
use App\Http\Requests\ChargeRequest;

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges=Charge::paginate(5);

        return view('admin.charges.index')->with(compact('charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.charges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChargeRequest $request)
    {
        $charge = new Charge();

        $charge->income_date = $request->input("income_date");
        $charge->amount = $request->input("amount");
        $charge->reason = $request->input("reason");
        $charge->status = $request->input("status");
        $charge->save();
        return redirect()->route('admin.charges.index')->with('message', 'Charge created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $charge = Charge::findOrFail($id);

        return view('admin.charges.show', compact('charge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charge = Charge::findOrFail($id);
        return view('admin.charges.edit', compact('charge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChargeRequest $request, $id)
    {
        $charge=Charge::findOrFail($id);
        $charge->income_date = $request->input("income_date");
        $charge->amount = $request->input("amount");
        $charge->reason = $request->input("reason");
        $charge->status = $request->input("status");
        $charge->save();
        return redirect()->route('admin.charges.index')->with('message', 'Charge updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = Charge::findOrFail($id);
        $charge->delete();

        return redirect()->route('admin.charges.index')->with('message', 'Charge deleted successfully.');
    }
}
