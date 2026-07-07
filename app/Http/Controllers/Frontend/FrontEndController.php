<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Project;
use App\Models\ContactUs;
use App\Models\HomeLayout;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Models\SmartCitySlider;
use App\Http\Controllers\Controller;
use App\Models\TransportationSolution;

class FrontEndController extends Controller
{
    // ================================================================
    // ======================== Welcome Function ======================
    // =================== Created by: Raghad ALKarasneh ==============
    // ==================== Updated by: Layth Al-Dwairi ===============
    // ================================================================
    public function welcome(Route $route)
    {
        try {
            $homeLayout = HomeLayout::first();
            $about = About::first();
            return view('welcome', compact('homeLayout', 'about'));
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }
}
