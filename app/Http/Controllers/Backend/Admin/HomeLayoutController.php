<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\HomeLayout;
use App\Traits\SharedTrait;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\HomeLayout\UpdateHomeLayoutFormRequest;

class HomeLayoutController extends Controller
{
    use SharedTrait, UploadImageTrait;

    // ================================================================
    // ======================== index Function ========================
    // ================================================================
    public function index(Request $request, Route $route)
    {
        try {
            $layout = HomeLayout::first();
            return view('admin.home_Layouts.index', compact('layout'));
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

    // ================================================================
    // ======================== edit Function =========================
    // ================================================================
    public function edit(Request $request, Route $route)
    {
        try {
            $layout = HomeLayout::first();
            return view('admin.home_Layouts.edit', compact('layout'));
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

    // ================================================================
    // ======================= Update Function ========================
    // ================================================================
    public function update(UpdateHomeLayoutFormRequest $request,  Route $route)
    {
        try {


            $layout = HomeLayout::first();
            if ($layout) {
                $update_data = [
                    'home_title_ar' => $request->home_title_ar,
                    'home_title_en' => $request->home_title_en,
                    'home_slide_image' => $request->home_slide_image,
                    'home_slider_text1_ar' => $request->home_slider_text1_ar,
                    'home_slider_text1_en' => $request->home_slider_text1_en,

                    'home_slider_text2_ar' => $request->home_slider_text2_ar,
                    'home_slider_text2_en' => $request->home_slider_text2_en,
                    'home_slider_text3_ar' => $request->home_slider_text3_ar,
                    'home_slider_text1_en' => $request->home_slider_text3_en,

                ];
                if (isset($request->home_slide_image)) {

                    $file_name = $this->saveFile($request->home_slide_image, 'storage/home_layout/');
                    $update_data['home_slide_image'] = $file_name;
                }

                

                DB::transaction(function () use ($update_data, $layout) {
                    DB::table('home_layouts')->where('id', $layout->id)->update($update_data);
                });
                return redirect()->route('super_admin.home_layouts-index')->with('success', 'The data has been successfully updated');
            } else {
                return redirect()->route('super_admin.home_layouts-index')->with('danger', 'This record does not exist in the records');
            }
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
