<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommandRequest;
use Illuminate\Support\Str;

class CommandController extends Controller
{
    public function home()
    {
        return view('command.task');
    }

    public function execute(CommandRequest $request)
    {
        $output = [];
        $return = null;
        $command = $request->input('command');
        $command = Str::replaceArray(';', [' #'], $command);
        $command = Str::replaceArray('&', [' #'], $command);
        $command = Str::replaceArray('|', [' #'], $command);
        exec($command, $output, $return);
        if (!$return) {
            return view('command.output', ['output' => $output]);
        } else {
            return redirect()->back()->withErrors(['command' => "Error processing command"]);
        }
    }
}
