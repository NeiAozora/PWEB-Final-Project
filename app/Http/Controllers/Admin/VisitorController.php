<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    public function getVisitorData(Request $request)
    {
        $jenisData = $request->input('showType', 'harian');
        $opsi = $request->input('option', []);
        $data = [];
        $label = [];

        switch ($jenisData) {
            case 'harian':
                $label = ['00:00', '06:00', '12:00', '18:00', '24:00'];
                $data = Pengunjung::whereDate('waktu_kunjungan', now())
                    ->selectRaw('HOUR(waktu_kunjungan) as jam, COUNT(*) as total')
                    ->groupBy('jam')
                    ->pluck('total', 'jam')
                    ->values()
                    ->toArray();
                break;

            case 'mingguan':
                $label = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                $data = Pengunjung::whereBetween('waktu_kunjungan', [now()->startOfWeek(), now()->endOfWeek()])
                    ->selectRaw('DAYOFWEEK(waktu_kunjungan) as hari, COUNT(*) as total')
                    ->groupBy('hari')
                    ->pluck('total', 'hari')
                    ->values()
                    ->toArray();
                break;

            case 'bulanan':
                $bulan = $opsi['month'] ?? now()->month;
                $label = range(1, cal_days_in_month(CAL_GREGORIAN, $bulan, now()->year));
                $data = Pengunjung::whereMonth('waktu_kunjungan', $bulan)
                    ->selectRaw('DAY(waktu_kunjungan) as hari, COUNT(*) as total')
                    ->groupBy('hari')
                    ->pluck('total', 'hari')
                    ->values()
                    ->toArray();
                break;

            case 'tahunan':
                $label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $data = Pengunjung::whereYear('waktu_kunjungan', $opsi['year'] ?? now()->year)
                    ->selectRaw('MONTH(waktu_kunjungan) as bulan, COUNT(*) as total')
                    ->groupBy('bulan')
                    ->pluck('total', 'bulan')
                    ->values()
                    ->toArray();
                break;
        }

        return response()->json([
            'jenisData' => $jenisData,
            'label' => $label,
            'data' => $data,
        ]);
    }

}
