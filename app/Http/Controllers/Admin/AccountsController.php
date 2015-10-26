<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Account;
use App\Model\Admin\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accounts=Account::paginate(5);
        $projects=array();
        foreach(Project::all() as $project){
            $projects[$project->id]=$project->project_name;
        }


        return view('admin.accounts.index')->with(compact('accounts','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=array();
        foreach(Project::all() as $project){
            $projects[$project->id]=$project->project_name;
        }
        return view('admin.accounts.create')->with(compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $account = new Account();

        $account->email = $request->input("email");
        $account->email_password = $request->input("email_password");
        $account->skype = $request->input("skype");
        $account->skype_password = $request->input("skype_password");
        $account->odesk = $request->input("odesk");
        $account->odesk_password = $request->input("odesk_password");
        $account->has_work = $request->input("has_work");
        $account->project_id = $request->input("project");
        $account->save();
        return redirect()->route('admin.accounts.index')->with('message', 'Account created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);
        $projects=array();
        foreach(Project::all() as $project){
            $projects[$project->id]=$project->project_name;
        }

        return view('admin.accounts.show', compact('account','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        $projects=array();
        foreach(Project::all() as $project){
            $projects[$project->id]=$project->project_name;
        }

        return view('admin.accounts.edit', compact('account','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, $id)
    {
        $account=Account::findOrFail($id);
        $account->email = $request->input("email");
        $account->email_password = $request->input("email_password");
        $account->skype = $request->input("skype");
        $account->skype_password = $request->input("skype_password");
        $account->odesk = $request->input("odesk");
        $account->odesk_password = $request->input("odesk_password");
        $account->has_work = $request->input("has_work");
        $account->project_id = $request->input("project");
        $account->save();
        return redirect()->route('admin.accounts.index')->with('message', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('admin.accounts.index')->with('message', 'Account deleted successfully.');
    }
}
