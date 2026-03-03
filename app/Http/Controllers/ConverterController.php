<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function index()
    {
        return view('converter');
    }

    public function process(Request $request)
    {
        $text = $request->input('text');
        $shift = $request->input('shift');
        $type = $request->input('type'); // encrypt atau decrypt
        $result = "";

        // Normalisasi shift agar selalu dalam rentang 0-25
        $shift = $shift % 26;

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? 65 : 97;
                $charPos = ord($char) - $asciiOffset;

                if ($type == 'encrypt') {
                    $newPos = ($charPos + $shift) % 26;
                } else {
                    $newPos = ($charPos - $shift + 26) % 26;
                }

                $result .= chr($newPos + $asciiOffset);
            } else {
                $result .= $char; // Karakter non-huruf tidak diubah
            }
        }

        return view('converter', compact('result', 'text', 'shift', 'type'));
    }
}
