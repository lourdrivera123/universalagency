<?php
class PersonalityquestionsTableSeeder extends Seeder {
    public function run()
    {

        Personalityquestion::create(['question' => 'Which of these nouns best suits your personality?']);

        Personalityquestion::create(['question' => 'Which of these are you least comfortable tackling in your career?']);

        Personalityquestion::create(['question' => 'You are most pleased when your peers appreciate:']);

        Personalityquestion::create(['question' => 'You most like to avoid which of these things in your career?']);

        Personalityquestion::create(['question' => 'Your gender can impact your career goals. Which are you?']);

        Personalityquestion::create(['question' => 'Your ideal career would consist of:']);

        Personalityquestion::create(['question' => 'Which approach do you think is best when interacting with people in your career?']);

        Personalityquestion::create(['question' => 'In looking for answers to problems, you value:']);

        Personalityquestion::create(['question' => 'How do you make most of your decisions?']);

        Personalityquestion::create(['question' => 'If your employer wanted to reward you, the best choice would be:']);

        Personalityquestion::create(['question' => 'It is Friday night and you want to go out to eat. How do you decide which restaurant to go to?']);

        Personalityquestion::create(['question' => 'Talking with people we dont know:']);

        Personalityquestion::create(['question' => 'How do you prefer to relax during your time off?']);


	}
}
