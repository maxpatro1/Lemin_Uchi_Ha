import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionPack from "./components/manager/QuestionPack";
import QuestionsList from "./components/manager/QuestionsList";
import Menu from "./components/student/menu"
import Game from "./components/student/Game/Game";
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: '/', component: QuestionPack },
        { path: '/student', component: Menu },
        { path: '/student/:id/game', component: Game },
        { path: '/question_pack/:id/questions', component: QuestionsList }
    ],
});

export default router;
