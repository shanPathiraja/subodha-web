<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            'award' => [
                [
                    'title' => 'IEEE “MGA Young Professionals” Achievement Award',
                    'period' => '2019',
                    'description' => 'For those substantive projects or achievements which have left an undeniable imprint on the fabric of IEEE Young Professionals operations',
                    'venue' => 'IEEE Member & Geographic Activities',
                ],
                [
                    'title' => 'Harris Corporation Communication Graduate Fellowship Award',
                    'period' => '2019',
                    'description' => 'For outstanding PhD students in the dept. Of Computer & Information Science & Engineering',
                    'venue' => 'University of Florida',
                ],
                [
                    'title' => 'IEEE “Larry K. Wilson” Award',
                    'period' => '2019',
                    'description' => 'For the best student volunteer of Asia-Pacific Region in 2015',
                    'venue' => 'IEEE Region 10',
                ],
                [
                    'title' => 'Dialog Axiata Merit Scholarship',
                    'period' => '2010 - 2013',
                    'description' => 'For top performance in Advanced Level examination in Sri Lanka',
                    'venue' => 'Dialog Axiata',
                ],
            ],

            'work' => [
                [
                    'title' => 'Research Assistant @ University of Florida',
                    'period' => 'Aug 2016 - Present',
                    'description' => 'System-on-Chip architecture optimization with 4-way interoperability constraints - security, power, performance and area',
                    'venue' => 'Embedded Systems Lab, University of Florida, Gainsville, FL, USA',
                ],
                [
                    'title' => 'Director @ Alta Vision (Pvt) Ltd',
                    'period' => 'Feb 2013 - Present',
                    'description' => 'Co-founder, Member of board www.altavision.lk',
                    'venue' => 'Alta Vision (Pvt) Ltd, Colombo, Sri Lanka',
                ],
                [
                    'title' => 'Graduate Technical Intern @ Intel Corporation',
                    'period' => 'May 2017 - Aug 2017',
                    'description' => 'Power and performance validation and debug of power control algorithms',
                    'venue' => 'Strategic CAD Labs, Intel Corporation, Portland, OR, USA',
                ],
                [
                    'title' => 'Lecturer @ University of Moratuwa',
                    'period' => 'Jan 2016 - Jul 2016',
                    'description' => 'Worked as a Lecturer on contract basis tutoring and handling multiple courses',
                    'venue' => 'University of Moratuwa, Colombo, Sri Lanka',
                ],
            ],
        ];

        foreach ($events as $type => $information) {
            foreach ($information as $event) {
                Event::create(array_merge($event, [
                    'user_id' => 1,
                    'type' => $type,
                ]));
            }
        }
    }
}
