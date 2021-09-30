<template>
    <div>
        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>
        <b-button
            variant="outline-primary"
            @click="openCreationPackModal"
        >
            Создать пак вопросов
        </b-button>
        <b-modal id="question-pack-modal">
            <b-form-group label="Введите название для пакета вопросов">
                <b-form-input v-model="newQuestionPack.name"></b-form-input>
            </b-form-group>
            <b-button
                variant="outline-primary"
                @click="createQuestionPack"
            >
                Создать
            </b-button>
        </b-modal>
        <div>{{questionPacks}}</div>
    </div>
</template>

<script>
import QuestionPackResource from "../../resources/question_pack_resource";

export default {
    name: "QuestionPack",
    data () {
        return {
            questionPacks: null,
            isLoading: false,
            newQuestionPack: {
                name: null,
                created_by: 3,
            }
        }
    },
    async mounted() {
        await this.fetchData()
    },
    methods: {
        async fetchData() {
            this.isLoading = true
            this.questionPacks = await QuestionPackResource.fetchQuestionPacks()
            this.isLoading = false
        },
        openCreationPackModal() {
            this.$bvModal.show('question-pack-modal')
        },
        async createQuestionPack() {
            await QuestionPackResource.saveQuestionPacks(this.newQuestionPack)
        }
    }
}
</script>

<style scoped>

</style>
