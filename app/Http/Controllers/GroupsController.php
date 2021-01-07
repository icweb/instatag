<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreatesGroups;
use App\Http\Requests\UpdatesGroups;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth()->user()->groups()->orderBy('title')->get();

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesGroups  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatesGroups $request)
    {
        $group = Group::create([
            'title' => $request->title,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('groups.show', $group);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $group->load('hashtags');

        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatesGroups  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesGroups $request, Group $group)
    {
        $group->update([
            'title' => $request->title
        ]);

        return redirect()->back()->with('success', 'Group has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try{
            foreach($group->hashtags as $hashtag)
            {
                $hashtag->delete();
            }
            $group->delete();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('groups.index');
    }
}
