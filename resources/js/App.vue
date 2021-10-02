<template>
    <router-view></router-view>
</template>

<script>
import QuestionPack from "./components/manager/QuestionPack";
import QuestionsList from "./components/manager/QuestionsList";
export default {
    name: "App",
    components: {QuestionsList, QuestionPack}
}
</script>

<style scoped>
    #App {
     font-family: Lato,serif;
     font-style: normal;
     font-weight: normal;
     font-size: 72px;
     line-height: 86px;
    }
</style>
