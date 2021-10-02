<template>
    <div>
<!--        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>-->
        <b-list-group class="col-md-9">
            <b-list-group-item>
                <b-button
                    v-if="!addingAnswer"
                    class="button-primary ml-auto"
                    @click="openAnswerInput"
                >
                    <b-icon-plus-circle></b-icon-plus-circle>
                    Добавить ответ
                </b-button>
                <div v-if="addingAnswer">
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
            <b-list-group-item v-for="answer in question.answers">
                {{answer.name}}
                <b-button>Edit</b-button>
                <div>
                    <b-form-input></b-form-input>
                    <b-button>Ok</b-button>
                    <b-button>Cancel</b-button>
                </div>
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
import AnswerResource from "../../resources/answer_resource";

export default {
    name: "AnswersList",
    props: {
        question: {
            type: Object
        }
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
        openAnswerInput() {
            console.log("Working")
            this.addingAnswer = true
        },
        async addAnswer() {
            console.log("Still working")
            if (this.newAnswer.name) {
                await AnswerResource.save(this.newAnswer)
            } else {
                console.log("newAnswer is empty")
            }
            console.log("Question: ", this.question)
            this.addingAnswer = false
            this.newAnswer.name = null
        }
    }
}
</script>

<style scoped>

</style>
