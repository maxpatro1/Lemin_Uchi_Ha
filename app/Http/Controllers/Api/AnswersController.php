<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswersController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Answer
     */
    protected $model;


    public function __construct(Request $request, Question $model)
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
        return $this->respond($this->model->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function store(Question $question): JsonResponse
    {
        $question->save();
        return $this->respond($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $question = QuestionPack::query()->find($id);
        if (!$question) {
            return $this->respondNotFound();
        }
        return $this->respond($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function update(Question $question): JsonResponse
    {
        $question->save();
        return $this->respond($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function destroy(Question $question): JsonResponse
    {
        $question->delete();
        return $this->respond($question);
    }

    public function getQuestionsByQuestionPackId(int $question_pack_id): JsonResponse
    {
        $questions = Question::query()->where($question_pack_id)->get();
        if (!$questions) {
            $this->respondNotFound();
        }
        return $this->respond($questions);
    }
}
