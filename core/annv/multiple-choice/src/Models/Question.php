<?php

namespace Annv\MultipleChoice\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Annv\MultipleChoice\Contracts\AbstractQuestion;

class Question extends Model
{
    use HasFactory;
    public function getQuestion(): AbstractQuestion
    {
        return \Annv\MultipleChoice\Factories\Factory::getQuestion($this);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
    public function mark(\Illuminate\Support\Collection $answers)
    {
        
    }
}
