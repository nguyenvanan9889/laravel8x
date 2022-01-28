<?php
abstract class Question {
    public abstract function getLayout();
}
class TrueFalse extends Question {
    public function getLayout()
    {
        return 'True false';
    }
}
class EnterBlank extends Question {
    public function getLayout()
    {
        return 'Enter blank';
    }
}
class EnterBlankCustom extends EnterBlank {
    public function getLayout()
    {
        return 'Enter blank custom';
    }
}
class Factory {
    public static function getQuestionType($type)
    {
        if ($type == 'true-false') {
            return new TrueFalse;
        }
        if ($type == 'enter-blank') {
            return new EnterBlank;
        }
    }
}
class QuestionCreator {
    public static function getLayout(Question $question)
    {
        return $question->getLayout();
    }
}
$question = Factory::getQuestionType('true-false');
echo QuestionCreator::getLayout(new EnterBlank);