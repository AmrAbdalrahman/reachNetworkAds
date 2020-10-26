<?php

namespace Modules\Ads\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Ads\Jobs\SendAdvertiserReminderEmail;
use Modules\Ads\Repositories\AdsRepository;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SendAdvertisersEmailReminder extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'advertisers:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedule a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder.';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $adsRepository;

    public function __construct(AdsRepository $adsRepository)
    {
        parent::__construct();

        $this->adsRepository = $adsRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $data = [
            'name' => 'Sameh'
        ];
        //get all ads for tomorrow
        $advertiserAds = $this->adsRepository->tomorrowAds();
        /*foreach ($advertiserAds as $Ad) {

            SendAdvertiserReminderEmail::dispatch($Ad->advertiser->email, ['title' => $Ad->title, 'description' => $Ad->description])->delay(Carbon::now()->addSeconds(5));
        }*/

        SendAdvertiserReminderEmail::dispatch('sameh@reachnetwork.co', $data)->delay(Carbon::now()->addSeconds(5));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    /*protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }*/

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
