<?php
abstract class AbstractQuestion {
    public abstract function layout();
}
class TrueFalseQuestion extends AbstractQuestion {
    public function layout()
    {
        return 'True false';
    }
}
class EnterBlankQuestion extends AbstractQuestion {
    public function layout()
    {
        return 'Enter blank question';
    }
}
class EnterBlankCustomQuestion extends AbstractQuestion {
    public function layout()
    {
        return 'Enter blank custom question';
    }
}
class Factory {
    public static function getQuestion(string $type): AbstractQuestion
    {
        if ($type == 'truefalse') {
            return new TrueFalseQuestion;
        }
        if ($type == 'enterblank') {
            return new EnterBlankQuestion;
        }
        // có nhược điểm là khi cần ghi đè loại câu hỏi truefalse chẳng hạn ta lại phải thêm if else tương ứng với kiểu câu hỏi đó
    }
}
class QuestionLayoutCreator {
    public static function render(AbstractQuestion $question)
    {
        return $question->layout();
    }
}
$layout = QuestionLayoutCreator::render(new EnterBlankCustomQuestion);
echo '<pre>'; var_dump($layout); die;