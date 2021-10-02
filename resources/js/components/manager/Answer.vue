<template>
    <div v-if="!editingAnswer">
        {{answer.name}}
        <b-button @click="openEditAnswerInput">Edit</b-button>
        <b-button @click="deleteAnswer">Delete</b-button>
    </div>
    <div v-else>
        <b-form-input v-model="answer.name"></b-form-input>
        <b-button @click="editAnswer">Ok</b-button>
        <b-button @click="closeEditAnswerInput">Cancel</b-button>
    </div>
</template>

<script>
import AnswerResource from "../../resources/answer_resource";

export default {
    name: "Answer",
    props: {
        answer: {
            type: Object,
        },
    },
    emits: {
        answersUpdate: null,
    },
    data() {
        return {
            editingAnswer: false,
        }
    },
    methods: {
        openEditAnswerInput() {
            console.log("open")
            this.editingAnswer = true
        },
        closeEditAnswerInput() {
            console.log("close")
            this.editingAnswer = false
        },
        async editAnswer() {
            if (this.answer.name) {
                await AnswerResource.save(this.answer)
                this.$emit("answersUpdate")
            } else {
                console.log("currentAnswer is empty")
            }
            this.closeEditAnswerInput()
        },
        async deleteAnswer() {
            await AnswerResource.delete(this.answer)
            this.$emit("answersUpdate")
        }
    }
}
</script>

<style scoped>

</style>
