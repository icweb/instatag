<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesHashtags;
use App\Http\Requests\UpdatesHashtags;
use App\Models\Group;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        return view('hashtags.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesHashtags  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatesHashtags $request)
    {
        $group = Group::findOrFail($request->group);

        $group->hashtags()->create([
            'hashtag' => $request->hashtag,
            'priority' => $request->priority,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('groups.show', ['group' => $group])->with('success', 'Hashtag has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(Hashtag $hashtag)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Hashtag $hashtag)
    {
        $hashtag->load('group');

        return view('hashtags.edit', compact( 'hashtag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatesHashtags  $request
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesHashtags $request, Hashtag $hashtag)
    {
        $hashtag->update([
            'user_id' => auth()->id(),
            'group_id' => $hashtag->group_id,
            'priority' => $request->priority,
            'hashtag' => $request->hashtag
        ]);

        return redirect()->route('groups.show', ['group' => $hashtag->group])->with('success', 'Hashtag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hashtag $hashtag)
    {
        try{
            $hashtag->delete();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('groups.show', ['group' => $hashtag->group])->with('success', 'Hashtag has been deleted successfully');
    }
}
