<?php

namespace App\Mail;

use App\Question;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LastFiveAnswer extends Mailable
{
    use Queueable, SerializesModels;

    public $question;

    /**
     * Return The Number of Answer against A Question if The question_type == 'textarea'
     */
    public function answerList(Question $question)
    {
        // Answer Method is Defined in Question Model
        $answer = $question->answer;

        if($question->question_type == 'textarea')
        {
            return count($answer);
        }
    }

    /**
     * Create a new message instance.
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('email.last-five-answer');
    }
}
