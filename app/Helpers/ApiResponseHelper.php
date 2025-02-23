<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class ApiResponseHelper
{
    public static function success($data, $message = 'Request successful', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ], $status);
    }

    public static function error($message = 'Something went wrong', $status = 400, $data=[])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => $data
        ], $status);
    }

    public static function paginated(LengthAwarePaginator $paginator, $message = 'Request successful', $status = 200)
    {
        return response()->json([
            'success'    => true,
            'message'    => $message,
            'data'       => $paginator->items(),
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
                'last_page'    => $paginator->lastPage(),
                'from'         => $paginator->firstItem(),
                'to'           => $paginator->lastItem()
            ]
        ], $status);
    }
}