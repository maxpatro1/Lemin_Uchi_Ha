<template>
    <div>
<!--        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>-->
        <b-list-group>
            <b-list-group-item>
                <b-button
                    v-if="!addingAnswer"
                    class="button-primary ml-auto"
                    @click="openAddAnswerInput"
                >
                    <b-icon-plus-circle></b-icon-plus-circle>
                    Добавить ответ
                </b-button>
                <div v-else>
                    <b-form-input
                        v-model="newAnswer.name"
                    ></b-form-input>
                    <b-button
                        class="button-primary ml-auto"
                        @click="addAnswer"
                    >
                        Save
                    </b-button>
                </div>
            </b-list-group-item>
            <b-list-group-item v-for="(answer, index) in question.answers">
                <b-row>
                    <span>{{ index + 1 }}.</span>
                    <answer
                        :answer="answer"
                        @answersUpdate="$emit('answersUpdate')"
                    ></answer>
                </b-row>
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
import Answer from "./Answer";
import AnswerResource from "../../resources/answer_resource";

export default {
    name: "AnswersList",
    components: {
        Answer
    },
    props: {
        question: {
            type: Object
        }
    },
    emits: {
      answersUpdate: null,
    },
    data() {
        return {
            isLoading: false,
            answers: null,
            addingAnswer: false,
            newAnswer: {
                name: null,
                question_id: this.question.id
            },
        }
    },
    methods: {
        openAddAnswerInput() {
            this.addingAnswer = true
        },
        async addAnswer() {
            if (this.newAnswer.name) {
                await AnswerResource.save(this.newAnswer)
                this.$emit("answersUpdate")
            } else {
                console.log("newAnswer is empty")
            }
            this.addingAnswer = false
            this.newAnswer.name = null
        }
    }
}
</script>

<style scoped>
    span {
        padding: 0 3%;
    }
</style>
