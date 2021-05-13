<?php

namespace Outdare\Backoffice\Controllers;

use App\Http\Controllers\Controller;

use Etnos\Etemail\EtEmail;

use Config;
use Log;
use Input;

class Helpdesk extends Controller
{
  public function add() {
    $project = env('APP_ENV','na');
    $message = Input::get('message');
    $projectEmail = Config::get('etemail::etemail.manager_email');

    $email = "<p>New TICKET for project ".$project." from ".$projectEmail."</p>";
    $email .= '<p>'.$message.'</p>';

    $sender = new EtEmail;
    $sender->sendToClient('helpdesk@etnos.co',$email);

    return response()->json(array('error' => false),200);
  }
}
