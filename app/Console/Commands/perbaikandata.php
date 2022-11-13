<?php

namespace App\Console\Commands;

use App\Models\M_dokter;
use App\Models\M_pasien;
use App\Models\T_anamnesa;
use App\Models\T_pelayanan;
use Illuminate\Console\Command;

class perbaikandata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perbaikandata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perbaikan Data pasien ke pendaftaran';

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
     * @return int
     */
    public function handle()
    {
        //perbaikan data nik ke pendaftaran
        $pasien = M_pasien::get();
        foreach ($pasien as $i) {
            if ($i->nik == null) {
            } else {
                $pelayanan = T_pelayanan::where('nik', $i->nik)->get();
                foreach ($pelayanan as $p) {
                    $p->update(['m_pasien_id' => $i->id]);
                }
            }
        }

        //perbaikan data status pulang dari tabel anamnesa ke tabel pendaftaran
        $anamnesa = T_anamnesa::get();
        foreach ($anamnesa as $a) {
            $pendaftaran = $a->pendaftaran;
            $pendaftaran->update([
                'kdStatusPulang' => $a->statusPulang == null ? $pendaftaran->kdStatusPulang : $a->statusPulang->kdStatusPulang
            ]);
        }
    }
}
