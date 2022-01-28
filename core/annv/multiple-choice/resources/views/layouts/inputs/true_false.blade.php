<div class="mc-question-content">
    {!! $question->name !!}
</div>
@foreach ($question->answers as $answer)
    <div class="mc-answer">
        <div class="item">
            <label>
                <input type="radio" name="answers[$question->id]" value="{{$answer->id}}">&nbsp;
                {!! $answer->name !!}
            </label>
        </div>
    </div>
@endforeach