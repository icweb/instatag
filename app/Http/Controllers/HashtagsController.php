<?php

namespace App\Http\Controllers;

use App\Group;
use App\Hashtag;
use App\Http\Requests\CreatesHashtags;
use App\Http\Requests\UpdatesHashtags;
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
        $hashtags = Hashtag::with('group')->orderBy('hashtag')->get();

        return view('hashtags.index', compact('hashtags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::orderBy('title')->get();

        return view('hashtags.create', compact('groups'));
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

        $hashtag = $group->hashtags()->create([
            'hashtag' => $request->hashtag
        ]);

        return redirect()->route('hashtags.show', compact('hashtag'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(Hashtag $hashtag)
    {
        $hashtag->load('group');

        return view('hashtags.show', compact('hashtag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Hashtag $hashtag)
    {
        $groups = Group::orderBy('title')->get();

        $hashtag->load('group');

        return view('hashtags.edit', compact('groups', 'hashtag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatesHashtags  $request
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesHashtags $request, Hashtag $hashtag)
    {
        $hashtag->update([
            'group_id' => $request->group,
            'hashtag' => $request->hashtag
        ]);

        return redirect()->back()->with('success', 'Hashtag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hashtag  $hashtag
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

        return redirect()->route('hashtags.index');
    }
}
