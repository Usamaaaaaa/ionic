<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Trafic;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateTraficRequest;

class TraficController extends Controller
{
    public function index()
    {

        $totalCount = Trafic::get()->count();
        return view('dashboard', ['totalCount' => $totalCount]);
    }
    public function trackVisit($externalId)
    {

        try {
            DB::beginTransaction();
            $trafic = Trafic::where('externalId', $externalId)->first();
            if (!$trafic) {

                throw new Exception('Record not found');
            }

            DB::commit();
            return $trafic;
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function updateStage(UpdateTraficRequest $request)
    {
        try {
            DB::beginTransaction();
            $trafic = Trafic::where('externalId', $request->externalId)->first();
            if (!$trafic) {

                throw new Exception('Record not found');
            }
            $trafic->update([
                'stages' => $request->stage
            ]);
            DB::commit();

            return response()->json(NULL, JsonResponse::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function getChartData()
    {
        try {
            $labels = ['visited', 'viewed_page', 'searched'];

            foreach ($labels as $label) {
                $data[] = Trafic::where('stages', $label)->count();
            }

            return [
                'labels' => $labels,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
