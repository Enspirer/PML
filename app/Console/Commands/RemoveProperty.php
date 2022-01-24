<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Properties;

class RemoveProperty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove All Properties from PML';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {        
        $this->info('Removing Propertis from PML Database...');

        $data = Properties::truncate();
        $data->delete();   

        $this->info('Deleted All Propertis from PML Database');

    }
}
