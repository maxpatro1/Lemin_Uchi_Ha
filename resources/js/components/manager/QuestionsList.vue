<template>
    <div v-if="questionPack">
        <page-title>{{questionPack.name}}
            <span v-if="questionPack.class">{{questionPack.class.dv}}</span>
        </page-title>
        <b-card class="card-shadow col-md-10 ml-auto mr-auto">
            <b-spinner label="Spinning" v-if="isLoading"></b-spinner>
            <b-row>
                <b-col class="col-md-10 d-flex align-items-center">
                    <h3>Вопросы</h3>
                </b-col>
                <b-col class="col-md-2">
                    <b-button
                        class="button-primary ml-auto"
                        @click="openQuestionModal('create')"
                    >
                        <b-icon-plus-circle></b-icon-plus-circle>
                        Добавить вопрос
                    </b-button>
                </b-col>
            </b-row>
            <b-list-group>
                <div v-for="(question,index) in questions">
                    <b-list-group-item
                        class="questions-accordion-item col-md-8"
                        v-b-toggle="'accordion-questions-' + index"
                        >
                        {{question.name}}
                    </b-list-group-item>
                    <b-collapse
                        :id="'accordion-questions-'+index"
                        :accordion="'questions-accordion'+index"
                        role="tabpanel"
                    >
                        <answers-list
                            @answersUpdate="fetchData"
                            :question="question"
                        ></answers-list>
                    </b-collapse>
                </div>
            </b-list-group>
        </b-card>
        <b-modal
            hide-footer
            id="question"
            title="Введите вопрос"
        >
            <b-form-input v-model="newQuestionList.name"></b-form-input>
            <b-button
                class="mt-3" variant="outline-primary"
                @click="createQuestion"
            >
                Создать
            </b-button>
        </b-modal>
    </div>
</template>

<script>
import QuestionResource from "../../resources/question_resource";
import DictsResource from "../../resources/dicts_resource";
import PageTitle from "../../ui/page-title";
import QuestionPackResource from "../../resources/question_pack_resource";
import AnswersList from "./AnswersList";

export default {
    name: "QuestionsList",
    components: {AnswersList, PageTitle},
    data () {
        return {
            isLoading: false,
            questions: null,
            newQuestionList: {
                name: null,
                question_pack_id: null,
                question_level_id: 1,
                question_type_id: 1
            },
            questionPack: null,
        }
    },
    async mounted() {
        await this.fetchData()
        await this.fetchDicts()
    },
    methods: {
        openAnswersList(index) {
            console.log('accordion-questions-' + index)
            this.$root.$emit('bv::toggle::collapse', 'accordion-questions-' + index)
        },
        async fetchData() {
            this.isLoading = true;
            this.questions = await QuestionResource.fetchQuestionsByPackId(this.getPackId)
            this.questionPack = await QuestionPackResource.get({id: this.getPackId})
            this.isLoading = false;
        },
        async fetchDicts() {
            this.levels = await DictsResource.fetchLevels();
            this.types = await DictsResource.fetchTypes()
        },
        openQuestionModal(type ,question) {
            if (type === 'update') {
                this.newQuestionList = question
            } else {
                this.newQuestionList = {
                    name: null,
                    question_pack_id: null,
                    question_level_id: 1,
                    question_type_id: 1
                }
            }
            this.$bvModal.show('question')
        },
        async createQuestion() {
            this.newQuestionList.question_pack_id = this.getPackId
            await QuestionResource.save(this.newQuestionList)
            this.newQuestionList = {
                name: null,
                question_pack_id: null,
                question_level_id: 1,
                question_type_id: 1
            }
            this.$bvModal.hide('question')
            await this.fetchData()
        },
        async deleteQuestion(question) {
            await QuestionResource.delete(question)
            await this.fetchData()
        },
    },

    computed: {
        getPackId() {
            return this.$route.path.split('/')[2]
        }
    }
}
</script>

<style scoped>
    .card-shadow {
        background: #FFFFFF;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
        border-radius: 17px;
    }
    .questions-accordion-item {
        background: #F7F7F7;
        border: 1px solid #EEEEEE;
        box-sizing: border-box;
        border-radius: 3px;
    }
</style>
