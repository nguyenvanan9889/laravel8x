<?php

namespace Annv\MultipleChoice\Factories;
use Annv\MultipleChoice\Contracts\AbstractQuestion;
use Annv\MultipleChoice\Models\Question;

class Factory {
    public static function getQuestion(Question $question): AbstractQuestion
    {
        $type = preg_replace_callback('/_.?/', function($word){
            return strtoupper(str_replace('_', '', $word[0]));
        }, $question->type);
        $type = ucfirst($type);
        $class = 'Annv\\MultipleChoice\\Classes\\'.$type.'Question';
        if (class_exists($class)) {
            return new $class($question);
        }
    }
}