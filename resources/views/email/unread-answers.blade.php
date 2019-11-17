@component('mail::message')

Hey {{ $question->user->name }},

In the past 48 hours, you received {{ $question->answer->count() }} answers to your text questions, that’s a lot to read. And list the last 5 in the email.

@component('mail::button', ['url' => url('http://127.0.0.1:8000/api/questions/'. $question->id .'/answer')])
All Answer
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent


Hey admin, in the past 48 hours, you received X answers to your text questions, that’s a lot to read. And list the last 5 in the email.  