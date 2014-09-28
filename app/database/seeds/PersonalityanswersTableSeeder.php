<?php

class PersonalityanswersTableSeeder extends Seeder {
    public function run()
    {
    	Personalityanswer::truncate();

        Personalityanswer::create(['question_id' => 1, 'personality' => 'stabili', 'answer' => 'Practicality']);
        Personalityanswer::create(['question_id' => 1, 'personality' => 'crisisMgr', 'answer' => 'Diversity']);
        Personalityanswer::create(['question_id' => 1, 'personality' => 'bigPicture', 'answer' => 'Analysis']);
        Personalityanswer::create(['question_id' => 1, 'personality' => 'harmonizer', 'answer' => 'Harmony']);

        Personalityanswer::create(['question_id' => 2, 'personality' => 'stabili', 'answer' => 'Unstructured work and vague suggestions']);
        Personalityanswer::create(['question_id' => 2, 'personality' => 'crisisMgr', 'answer' => 'Repetitive tasks']);
        Personalityanswer::create(['question_id' => 2, 'personality' => 'bigPicture', 'answer' => 'Clearly defined work']);
        Personalityanswer::create(['question_id' => 2, 'personality' => 'harmonizer', 'answer' => 'Having to work in isolation']);

        Personalityanswer::create(['question_id' => 3, 'personality' => 'stabili', 'answer' => 'How you help them achieve their full potential']);
        Personalityanswer::create(['question_id' => 3, 'personality' => 'crisisMgr', 'answer' => 'How much you contribute to the smoother operations of the group']);
        Personalityanswer::create(['question_id' => 3, 'personality' => 'bigPicture', 'answer' => 'Your ability to solve problems and help shape strategies for the future']);
        Personalityanswer::create(['question_id' => 3, 'personality' => 'harmonizer', 'answer' => 'The fun and joy you bring to the workplace']);

        Personalityanswer::create(['question_id' => 4, 'personality' => 'stabili', 'answer' => 'Disorganization']);
        Personalityanswer::create(['question_id' => 4, 'personality' => 'crisisMgr', 'answer' => 'Routine']);
        Personalityanswer::create(['question_id' => 4, 'personality' => 'bigPicture', 'answer' => 'Incompetence']);
        Personalityanswer::create(['question_id' => 4, 'personality' => 'harmonizer', 'answer' => 'Insincerity']);

        Personalityanswer::create(['question_id' => 5, 'personality' => 'stabili/bigPicture', 'answer' => 'I am a man and I think I have a goal-oriented career personality.']);
        Personalityanswer::create(['question_id' => 5, 'personality' => 'stabili/bigPicture', 'answer' => 'I am a woman and I think I have a goal-oriented career personality.']);
        Personalityanswer::create(['question_id' => 5, 'personality' => 'crisisMgr/harmonizer', 'answer' => 'I am a man and I think I have a more easy-going career personality.']);
        Personalityanswer::create(['question_id' => 5, 'personality' => 'crisisMgr/harmonizer', 'answer' => 'I am a woman and I think I have a more easy-going career personality.']);

        Personalityanswer::create(['question_id' => 6, 'personality' => 'stabili', 'answer' => 'Structure and order']);
        Personalityanswer::create(['question_id' => 6, 'personality' => 'crisisMgr', 'answer' => 'Action and variety']);
        Personalityanswer::create(['question_id' => 6, 'personality' => 'bigPicture', 'answer' => 'Mastery and achievement']);
        Personalityanswer::create(['question_id' => 6, 'personality' => 'harmonizer', 'answer' => 'Kindness and consideration']);

        Personalityanswer::create(['question_id' => 7, 'personality' => 'stabili/bigPicture', 'answer' => 'I think it is best to be impersonal and impartial.']);
        Personalityanswer::create(['question_id' => 7, 'personality' => 'crisisMgr/harmonizer', 'answer' => 'I think it is only fair to be sensitive to people.']);

        Personalityanswer::create(['question_id' => 8, 'personality' => 'stabili', 'answer' => 'What you have learned from experience']);
        Personalityanswer::create(['question_id' => 8, 'personality' => 'crisisMgr', 'answer' => 'What seems to be able to get the job done']);
        Personalityanswer::create(['question_id' => 8, 'personality' => 'bigPicture', 'answer' => 'Finding new ways of understanding what will prevent future problems']);
        Personalityanswer::create(['question_id' => 8, 'personality' => 'harmonizer', 'answer' => 'Fairness and equity']);

        Personalityanswer::create(['question_id' => 9, 'personality' => 'stabili/bigPicture', 'answer' => 'I begin with a logical, impersonal review of the facts.']);
        Personalityanswer::create(['question_id' => 9, 'personality' => 'crisisMgr/harmonizer','answer' => 'Ultimately, my choice is shaped by my deeply held values.']);

        Personalityanswer::create(['question_id' => 10, 'personality' => 'stabili', 'answer' => 'An award in front of your peers']);
        Personalityanswer::create(['question_id' => 10, 'personality' => 'crisisMgr', 'answer' => 'A party to celebrate your contributions']);
        Personalityanswer::create(['question_id' => 10, 'personality' => 'bigPicture', 'answer' => 'More authority to manage a new project']);
        Personalityanswer::create(['question_id' => 10, 'personality' => 'harmonizer', 'answer' => 'A weekend trip to a fun place']);

        Personalityanswer::create(['question_id' => 11, 'personality' => 'crisisMgr/harmonizer', 'answer' => 'I think about all the kinds of food we might eat, then consider my favorite places in different categories.']);
        Personalityanswer::create(['question_id' => 11, 'personality' => 'stabili/bigPicture', 'answer' => 'I like to polish on what I want and where I know I can get a reservation immediately.']);

        Personalityanswer::create(['question_id' => 12, 'personality' => 'stabili', 'answer' => 'Requires extra energy that is not always available']);
        Personalityanswer::create(['question_id' => 12, 'personality' => 'bigPicture', 'answer' => 'Is something busy people must limit to manage their work']);
        Personalityanswer::create(['question_id' => 12, 'personality' => 'crisisMgr', 'answer' => 'Gives new perspectives that stimulate and provoke']);
        Personalityanswer::create(['question_id' => 12, 'personality' => 'harmonizer', 'answer' => 'Is fun and makes like more interesting']);

        Personalityanswer::create(['question_id' => 13, 'personality' => 'stabili/bigPicture', 'answer' => 'I like having time to myself and thinking my own thoughts.']);
        Personalityanswer::create(['question_id' => 13, 'personality' => 'crisisMgr/harmonizer', 'answer' => 'I spend time with a group of friends, the more the merrier.']);
	}
}
