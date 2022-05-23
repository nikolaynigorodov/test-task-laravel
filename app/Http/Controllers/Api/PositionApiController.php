<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helper\PositionApiMessageHelper;
use App\Http\Resources\PositionApiResource;
use App\Models\Position;
use Illuminate\Http\JsonResponse;

class PositionApiController extends Controller
{
    /**
     * @var PositionApiMessageHelper
     */
    private $positionApiMessageHelper;

    public function __construct(PositionApiMessageHelper $positionApiMessageHelper)
    {
        $this->positionApiMessageHelper = $positionApiMessageHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $positions = new PositionApiResource(Position::all());
        if($positions->resource === null) {
            return response()->json($this->positionApiMessageHelper->positionNotFound()->getMessage(), 404);
        }

        return response()->json($this->positionApiMessageHelper->positionSuccess($positions)->getMessage(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        return response()->json($this->positionApiMessageHelper->positionPageNotFound()->getMessage(), 404);
    }
}
