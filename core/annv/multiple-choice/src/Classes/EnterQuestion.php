<?php

namespace Annv\MultipleChoice\Classes;
use Annv\MultipleChoice\Contracts\AbstractQuestion;
use Annv\MultipleChoice\Models\Question;

class EnterQuestion extends AbstractQuestion {
    protected $question;
    public function __construct(Question $question)
    {
        $this->question = $question;
    }
    public function getLayoutInput()
    {
        return view('multiple_choice::layouts.inputs.enter', ['question' => $this->question]);
    }
    public function getLayoutOutput()
    {
        
    }
}