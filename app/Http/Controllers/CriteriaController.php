<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Contest;
use App\Models\Round;
use App\Models\Score;

class CriteriaController extends Controller
{
    public function store(Request $request, Round $round, Contest $contest) {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'weight' => 'numeric|required',
        ]);

        $criteria=Criteria::create([
            'name' => $request->name,
            'description' => $request->description,
            'weight' => $request->weight,
            'round_id' => $round->id
        ]);

        foreach($round->contestants as $contestant) {
            foreach($round->contest->judges as $judge) {
                Score::create([
                    'contestant_id' => $contestant->id,
                    'judge_id' => $judge->id,
                    'round_id' => $round->id,
                    'criteria_id' => $criteria->id
                ]);
            }
        }

        if ($contest->dancesports) {
            return redirect('/dancesports/' . $contest->id)->with('Info', 'A criteria has been added.');
        } else {
            return redirect('/rounds/'. $round->id . '/' . $contest->id)->with('Info', 'A criteria has been added.');
        }
    }

    public function show(Criteria $criteria) {
        return view('criterias.show', [
            'criteria' => $criteria
        ]);
    }

    public function update(Criteria $criteria, Request $request) {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'weight' => 'numeric|required'
        ]);

        $criteria->update($request->only('name','description','weight'));

        return redirect('/contests/' . $criteria->contest_id)->with('Info','Criteria ' . $criteria->name . ' has been updated.');
    }
}
