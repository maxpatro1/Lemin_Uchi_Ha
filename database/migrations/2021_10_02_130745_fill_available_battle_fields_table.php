<?php

use App\Models\AvailableBattleFields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillAvailableBattleFieldsTable extends Migration
{
    const Fields = [
        [
            'field_id' => 1,
            'available_field_id' => 2,
        ],
        [
            'field_id' => 1,
            'available_field_id' => 3,
        ],
        [
            'field_id' => 1,
            'available_field_id' => 4,
        ],
        // 2222222
        [
            'field_id' => 2,
            'available_field_id' => 1,
        ],
        [
            'field_id' => 2,
            'available_field_id' => 3,
        ],
        [
            'field_id' => 2,
            'available_field_id' => 5,
        ],
        // 3333333
        [
            'field_id' => 3,
            'available_field_id' => 1,
        ],
        [
            'field_id' => 3,
            'available_field_id' => 2,
        ],
        [
            'field_id' => 3,
            'available_field_id' => 4,
        ],
        [
            'field_id' => 3,
            'available_field_id' => 5,
        ],
        [
            'field_id' => 3,
            'available_field_id' => 6,
        ],
        [
            'field_id' => 3,
            'available_field_id' => 7,
        ],
        // 44444444444
        [
            'field_id' => 4,
            'available_field_id' => 1,
        ],
        [
            'field_id' => 4,
            'available_field_id' => 3,
        ],
        [
            'field_id' => 4,
            'available_field_id' => 7,
        ],
        // 5555555555
        [
            'field_id' => 5,
            'available_field_id' => 2,
        ],
        [
            'field_id' => 5,
            'available_field_id' => 3,
        ],
        [
            'field_id' => 5,
            'available_field_id' => 6,
        ],
        [
            'field_id' => 5,
            'available_field_id' => 8,
        ],
        // 666666
        [
            'field_id' => 6,
            'available_field_id' => 3,
        ],
        [
            'field_id' => 6,
            'available_field_id' => 5,
        ],
        [
            'field_id' => 6,
            'available_field_id' => 7,
        ],
        [
            'field_id' => 6,
            'available_field_id' => 8,
        ],
        [
            'field_id' => 6,
            'available_field_id' => 9,
        ],
        [
            'field_id' => 6,
            'available_field_id' => 10,
        ],
        // 7777777
        [
            'field_id' => 7,
            'available_field_id' => 10,
        ],
        [
            'field_id' => 7,
            'available_field_id' => 6,
        ],
        [
            'field_id' => 7,
            'available_field_id' => 4,
        ],
        [
            'field_id' => 7,
            'available_field_id' => 3,
        ],
        // 888888
        [
            'field_id' => 8,
            'available_field_id' => 11,
        ],
        [
            'field_id' => 8,
            'available_field_id' => 9,
        ],
        [
            'field_id' => 8,
            'available_field_id' => 6,
        ],
        [
            'field_id' => 8,
            'available_field_id' => 5,
        ],
        // 9999999
        [
            'field_id' => 9,
            'available_field_id' => 13,
        ],
        [
            'field_id' => 9,
            'available_field_id' => 12,
        ],
        [
            'field_id' => 9,
            'available_field_id' => 11,
        ],
        [
            'field_id' => 9,
            'available_field_id' => 10,
        ],
        [
            'field_id' => 9,
            'available_field_id' => 8,
        ],
        [
            'field_id' => 9,
            'available_field_id' => 6,
        ],
        // 10 10 10
        [
            'field_id' => 10,
            'available_field_id' => 13,
        ],
        [
            'field_id' => 10,
            'available_field_id' => 9,
        ],
        [
            'field_id' => 10,
            'available_field_id' => 7,
        ],
        [
            'field_id' => 10,
            'available_field_id' => 6,
        ],
        // 11 11 11
        [
            'field_id' => 11,
            'available_field_id' => 12,
        ],
        [
            'field_id' => 11,
            'available_field_id' => 9,
        ],
        [
            'field_id' => 11,
            'available_field_id' => 8,
        ],
        // 12 12 12
        [
            'field_id' => 12,
            'available_field_id' => 13,
        ],
        [
            'field_id' => 12,
            'available_field_id' => 11,
        ],
        [
            'field_id' => 12,
            'available_field_id' => 9,
        ],
        // 13 13 13
        [
            'field_id' => 13,
            'available_field_id' => 12,
        ],
        [
            'field_id' => 13,
            'available_field_id' => 10,
        ],
        [
            'field_id' => 13,
            'available_field_id' => 9,
        ],

    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dict_question_levels', function (Blueprint $table) {
            foreach (static::Fields as $type) {
                AvailableBattleFields::query()->create([
                    'field_id' => $type['field_id'],
                    'available_field_id' => $type['available_field_id']
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
