<template>
    <div>
<!--        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>-->
        <b-list-group class="col-md-9">
            <b-list-group-item v-for="answer in question.answers">
                {{answer.name}}
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
            answers: null
        }
    },
}
</script>

<style scoped>

</style>
