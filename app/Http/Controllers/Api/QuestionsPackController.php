<?php

namespace App\Http\Controllers\Api;

use App\Models\QuestionPack;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionsPackController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var QuestionPack
     */
    protected $model;


    public function __construct(Request $request, QuestionPack $model)
    {
        $this->request = $request;
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        //TODO VALIDATION
        return $this->respond(QuestionPack::query()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestionPack  $questionPack
     * @return JsonResponse
     */
    public function store(QuestionPack $questionPack): JsonResponse
    {
        $questionPack->save();
        return $this->respond($questionPack);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $question_pack = QuestionPack::query()->find($id);
        if (!$question_pack) {
            return $this->respondNotFound();
        }
        return $this->respond($question_pack);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionPack $questionPack
     * @return JsonResponse
     */
    public function update(QuestionPack $questionPack): JsonResponse
    {
        $questionPack->save();
        return $this->respond($questionPack);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param QuestionPack $questionPack
     * @return JsonResponse
     */
    public function destroy(QuestionPack $questionPack): JsonResponse
    {
        $questionPack->delete();
        return $this->respond($questionPack);
    }
}
