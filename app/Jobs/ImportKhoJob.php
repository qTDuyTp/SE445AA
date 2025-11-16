<?php

namespace App\Jobs;

use App\Models\KhoHang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportKhoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public array $data;

    public function __construct(array $data)
    {
        $this-> data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        KhoHang::updateOrCreate(
            ['Makho'=>$this->data['Makho']],
            [
                'SoLuong'=>$this->data['SoLuong'],
                'Vitri'=>$this->data['Vitri'],                
            ]
        );
    }
}
