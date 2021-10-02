<template>
    <div>
        <b-card
            class="w-100"
            @click="openQuestionModal"
            v-for="field in battleFields">
            {{field.id}}
        </b-card>
        <b-modal
            hide-backdrop
            id="student-question-modal"
        >
            <div v-if="question">
                <span>
                    {{question[0].name}}
                </span>
                <b-list-group-item v-for="answer in question[0].answers">
                    <span @click="postAnswer">{{ answer.name }}</span>
                </b-list-group-item>
            </div>
        </b-modal>
    </div>
</template>

<script>

import QuestionResource from "../../../resources/question_resource";

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
          fieldsData: null,
          question: null
      }
    },
    methods: {
        async openQuestionModal() {
            await this.getQuestion()
            console.log(this.question[0])
            if (this.question)
            {
                this.$bvModal.show('student-question-modal')
            }
        },
        async getQuestion() {
            this.question = await QuestionResource.fetchStudentQuestionByPackId(this.battle.pack_id)
        },
        async postAnswer() {
            this.$bvModal.hide('student-question-modal')
        }
    }
}
</script>

<style scoped>

</style>
