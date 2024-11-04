<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        $videosFundamental = [
            ['title' => 'Fundamental 06', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amef6'],
            ['title' => 'Fundamental 07', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amef7'],
            ['title' => 'Fundamental 08', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amef8'],
            ['title' => 'Fundamental 09', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amef9'],
        ];

        $videosMedio = [
            ['title' => 'Médio 01', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-am1'],
            ['title' => 'Médio 02', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-am2'],
            ['title' => 'Médio 03', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-am3'],
            ['title' => 'EJA Médio 01', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amejamedio1'],
            ['title' => 'EJA Médio 02', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amejamedio2'],
            ['title' => 'EJA Médio 04', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amejamedio4'],
            ['title' => 'EJA Médio 05', 'link' => 'https://realmsweb.ip.tv/iframe/seduc-amejamedio1'],
        ];

        return view('videos', compact('videosFundamental', 'videosMedio'));
    }

}
