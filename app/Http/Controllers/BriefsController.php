<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use DebugBar\DebugBar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BriefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(view("briefs.view"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return new Response(view("briefs.create"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $brief = new Brief();
        $values = $request->all([
            "name",
            "email",
            "position_id",
            "level_id",
            "interview_date",
            "skills",
            "text",
            "experience",
            "decision_id",
        ]);
        $brief->fill($values);
        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|required',
            'position_id' => 'bail|required',
            'level_id' => 'bail|required',
            'interview_date' => 'bail|required',
            'skills' => 'bail|required',
            'text' => 'bail|required',
            'experience' => 'bail|required',
            'decision_id' => 'bail|required',
        ], [
            'name.required' => 'ФИО',
            'email.required' => 'email',
            'position_id.required' => 'позиция',
            'level_id.required' => 'уровень',
            'interview_date.required' => 'дата',
            'skills.required' => 'навыки',
            'experience.required' => 'опыт',
            'decision_id.required' => 'решение',
            'text.required' => 'резюме',
        ]);
        $brief->save();


        return new Response(view("briefs.view")->with("briefs", Brief::all()));
    }

    /**
     * Display the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function show(Brief $brief)
    {
        return new Response(view("briefs.show")->with("brief", $brief));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brief $brief
     * @return Response
     */
    public function edit(Brief $brief)
    {
        return new Response(view("briefs.edit")->with("brief", $brief));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Brief $brief
     * @return Response
     */
    public function update(Request $request, Brief $brief): Response
    {
        $brief->update($request->all());
        return new Response(view("briefs.show")->with("brief", $brief));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brief $brief
     * @return Response
     */
    public function destroy(Brief $brief): Response
    {
        $brief->delete();
        return new Response(redirect("briefs"));
    }
}
