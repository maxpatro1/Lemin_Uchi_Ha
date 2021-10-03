<template>
    <div class="board">
        <div v-for="field in battleFields">
            <div class="first-container" @click="openQuestionModal(field.id)">
                <img src="" alt="dsf"/>
            </div>
        </div>
        <b-modal
            hide-backdrop
            id="student-question-modal"
        >
            <div v-if="question">
                <span>
                    {{question[0].name}}
                </span>
                <div v-for="answer in question[0].answers">
                    <b-list-group-item
                        :class="{correct: answer.is_correct === true
                    && answersShow, wrong: answer.is_correct === false && answersShow}"
                        @click="showAnswer(answer)">
                        <span>{{ answer.name }}</span>
                    </b-list-group-item>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>

import QuestionResource from "../../../resources/question_resource";
import GameFieldResource from "../../../resources/game_field_resource";
import GameResource from "../../../resources/game_resource";

export default {
    name: "GameField",
    props: {
        battleFields: {
            type: Array
        },
        battle: {
            type: Object
        },
    },
    data() {
      return {
          currentField: null,
          fieldsData: null,
          question: null,
          answersShow: false,
          correct: null,
          wrong: null,
          image: 'resources/js/assets/1.svg'
      }
    },
    methods: {
        async openQuestionModal(id) {
            await this.getQuestion()
            if (this.question)
            {
                this.currentField = id
                this.$bvModal.show('student-question-modal')
            }
        },
        async getQuestion() {
            this.question = await QuestionResource.fetchStudentQuestionByPackId(this.battle.pack_id)
        },
        async showAnswer(answer) {
            this.answersShow = true
            setTimeout(() => {this.postAnswer(answer)}, 3000)
        },
        async postAnswer(answer) {
            if (answer.is_correct === true)
            {
                const test = await GameFieldResource.save({
                    id: this.currentField,
                    whos_field_id: this.battle.whos_round
                })
                console.log(test)
            }
            if(this.battle.whos_round === this.battle.team_id) {
                this.battle.whos_round = this.battle.second_team_id
            } else if(this.battle.whos_round === this.battle.second_team_id) {
                this.battle.whos_round = this.battle.team_id
            }
            await GameResource.save({
                id: this.battle.id,
                whos_round: this.battle.whos_round
            })
            console.log(this.battle.whos_round)
            this.answersShow = false
            this.$bvModal.hide('student-question-modal')
        }
    }
}
</script>

<style scoped>
    .correct {
        background: #58DD36;
    }
    .wrong {
        background: #DE1A1A;
    }
    .board {
        position: absolute;
        width: 395px;
        height: 417px;
        left: 10px;
        top: 411px;
    }
    .first-container {
        position: absolute;
        width: 104px;
        height: 88px;
        left: 10px;
        top: 740px;
        /*background-image: url("resources/js/assets/1.svg");*/
    }
</style>
