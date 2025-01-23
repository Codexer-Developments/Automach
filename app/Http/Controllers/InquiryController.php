<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'car_id' => 'required|exists:cars,id',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Save the inquiry
        $inquiry = Inquiry::create($validator->validated());

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Inquiry submitted successfully!',
            'inquiry' => $inquiry,
        ]);
    }
}
