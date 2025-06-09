<?php

namespace App\Console\Commands;

use App\Models\Performance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportPerformances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-performances {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports performances times from CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('file');

        if (!file_exists($path)) {
            $this->error("File not found: $path");
            return 1;
        }

        DB::table('performances')->truncate();
        $data = array_map('str_getcsv', file($path));
        $header = array_shift($data);

        foreach ($data as $row) {
            $performanceData = array_combine($header, $row);

            Performance::create([
                'title' => $performanceData['title'],
                'start_time' => $performanceData['start_time'],
                'end_time' => $performanceData['end_time'],
            ]);
        }

        $this->info("Performances imported successfully.");
        return 0;
    }
}
