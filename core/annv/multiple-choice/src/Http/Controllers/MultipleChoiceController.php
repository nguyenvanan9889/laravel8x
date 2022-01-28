<?php

namespace Annv\MultipleChoice\Http\Controllers;
use Illuminate\Http\Request;
use Annv\MultipleChoice\Models\Question;

class MultipleChoiceController {
    public function view(Request $request)
    {
        $questions = Question::with('answers')->get();
        return view('multiple_choice::input_view', compact('questions'));
    }
}