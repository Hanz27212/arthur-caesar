<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function index(Request $request)
    {
        // Default values
        $result = null;
        $text = $request->input('text', '');
        $key = (int)$request->input('key', 1);
        $action = $request->input('action', 'encrypt');

        // Hanya proses jika request adalah POST
        if ($request->isMethod('post') && !empty($text)) {
            $chars = str_split($text);
            $processedResult = "";

            foreach ($chars as $char) {
                if (preg_match("/[a-z]/i", $char)) {
                    $isUpper = ctype_upper($char);
                    $asciiOffset = $isUpper ? 65 : 97;
                    $charIndex = ord($char) - $asciiOffset;

                    if ($action == 'encrypt') {
                        $newIndex = ($charIndex + $key) % 26;
                    } else {
                        $newIndex = ($charIndex - $key) % 26;
                    }

                    // Pastikan hasil modulo selalu positif (0-25)
                    if ($newIndex < 0) $newIndex += 26;

                    $processedResult .= chr($newIndex + $asciiOffset);
                } else {
                    $processedResult .= $char;
                }
            }
            $result = $processedResult;
        }

        return view('converter', [
            'result' => $result,
            'oldText' => $text,
            'oldKey' => $key,
            'oldAction' => $action
        ]);
    }
}
