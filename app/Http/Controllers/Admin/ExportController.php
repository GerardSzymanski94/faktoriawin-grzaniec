<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegistersExport;
use App\Http\Controllers\Controller;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function all()
    {
        $registers = Register::all();

        $array = [];

        $i = 1;
        foreach ($registers as $ret) {
            $id = $ret->id;

            $array[] = array($id, Carbon::parse($ret->created_at)->format('Y-m-d H:i:s'),
                $ret->email,
                $ret->bill_number,
                $ret->bill_date,
                $ret->ip_address);

            $i++;
        }
        $reviews[] = [
            "Id" => "Id",
            "Data zgłoszenia" => "Data zgłoszenia",
            "Email" => "Email",
            "Numer paragonu" => "Numer paragonu",
            "Data paragonu" => "Data paragonu",
            "IP" => "IP",
        ];
        $reviews = array_merge($reviews, $array);
        return Excel::download(new RegistersExport($reviews), 'registers.xlsx');
    }

    public function winners()
    {
        $registers = Register::whereNotNull('prize')->get();

        $array = [];

        $i = 1;
        foreach ($registers as $ret) {
            $id = $ret->id;

            $array[] = array($id, Carbon::parse($ret->created_at)->addHour()->format('Y-m-d H:i:s'),
                $ret->name,
                $ret->lastname,
                $ret->street,
                $ret->city,
                $ret->zip_code,
                $ret->prize_name,
                $ret->email,
                $ret->bill_number,
                $ret->bill_date,
                $ret->ip_address,
            );

            $i++;
        }
        $reviews[] = [
            "Id" => "Id",
            "Data zgłoszenia" => "Data zgłoszenia",
            "Imię" => "Imię",
            "Nazwisko" => "Nazwisko",
            "Ulica" => "Ulica",
            "Miasto" => "Miasto",
            "Kod pocztowy" => "Kod pocztowy",
            "Stopień wygranej" => "Stopień wygranej",
            "Email" => "Email",
            "Numer paragonu" => "Numer paragonu",
            "Data paragonu" => "Data paragonu",
            "IP" => "IP",
        ];
        $reviews = array_merge($reviews, $array);
        return Excel::download(new RegistersExport($reviews), 'winners.xlsx');
    }
}
