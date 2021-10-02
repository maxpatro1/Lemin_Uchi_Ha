<?php

namespace App\Http\Controllers\Api;

use App\Models\Dictionaries\DictQuestionLevels;
use App\Models\Dictionaries\DictQuestionTypes;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DictionariesController extends ApiController
{
    public function getLevelDict(): JsonResponse
    {
        return $this->respond(DictQuestionLevels::query()->get());
    }
    public function getTypesDict(): JsonResponse
    {
        return $this->respond(DictQuestionTypes::query()->get());
    }
}
