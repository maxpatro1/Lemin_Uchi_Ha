<template>
    <div>
        <b-spinner label="Spinning" v-if="isLoading"></b-spinner>
        <b-button
            variant="outline-primary"
            @click="openCreationPackModal"
        >
            Создать пак вопросов
        </b-button>
        <b-list-group>
            <b-list-group-item v-for="questionPack in questionPacks">
                <div>
                    <span>{{questionPack.name}}</span>
                </div>
                <b-button
                    variant="outline-primary"
                    @click="openUpdatingPackModal(questionPack)"
                >Update</b-button>
                <b-button
                    variant="danger"
                    @click="deleteQuestionPack(questionPack)"
                >Delete</b-button>
            </b-list-group-item>
        </b-list-group>
        <b-modal
            hide-footer
            id="new-question-pack-modal"
            title="Введите название для пакета вопросов"
        >
            <b-form-input v-model="newQuestionPack.name"></b-form-input>
            <b-button
                class="mt-3" variant="outline-primary"
                @click="createQuestionPack"
            >
                Создать
            </b-button>
        </b-modal>
        <b-modal
            hide-footer
            id="current-question-pack-modal"
            title="Название для пакета вопросов"
        >
            <b-form-input v-model="currentQuestionPack.name"></b-form-input>
            <b-button
                class="mt-3" variant="outline-primary"
                @click="updateQuestionPack"
            >
                Обновить
            </b-button>
        </b-modal>
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
            },
            currentQuestionPack: {
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
            this.$bvModal.show('new-question-pack-modal')
        },
        openUpdatingPackModal(questionPack) {
            this.currentQuestionPack.name = questionPack.name
            this.$bvModal.show('current-question-pack-modal')
        },
        async createQuestionPack() {
            await QuestionPackResource.save(this.newQuestionPack)
            this.newQuestionPack = {
                name: null,
                created_by: 3,
            }
            this.$bvModal.hide('new-question-pack-modal')
            await this.fetchData()
        },
        async updateQuestionPack() {
            await QuestionPackResource.save(this.currentQuestionPack)
            this.newQuestionPack = {
                name: null,
                created_by: 3,
            }
            this.$bvModal.hide('current-question-pack-modal')
            await this.fetchData()
        },
        async deleteQuestionPack(questionPack) {
            await QuestionPackResource.delete(questionPack)
            console.log("Pack has been deleted")
            await this.fetchData()
        },
    }
}
</script>

<style scoped>

</style>
