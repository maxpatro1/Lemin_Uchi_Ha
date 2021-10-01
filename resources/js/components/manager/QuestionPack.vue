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
                <router-link>
                    <span>{{questionPack.name}}</span>
                </router-link>
            </b-list-group-item>
        </b-list-group>
        <b-modal
            hide-footer
            id="question-pack-modal"
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
            await QuestionPackResource.save(this.newQuestionPack)
            this.newQuestionPack = {
                name: null,
                created_by: 3,
            }
            this.$bvModal.hide('question-pack-modal')
            await this.fetchData()
        }
    }
}
</script>

<style scoped>

</style>
