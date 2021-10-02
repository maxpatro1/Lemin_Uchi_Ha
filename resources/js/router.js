import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionPack from "./components/manager/QuestionPack";
import QuestionsList from "./components/manager/QuestionsList";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: '/', component: QuestionPack },
        { path: '/question_pack/:id/questions', component: QuestionsList }
    ],
});

export default router;
