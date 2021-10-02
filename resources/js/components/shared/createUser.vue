<template>
    <div>
        <h1>Выбери своего бойца</h1>
        <h2>Учитель <b-button @click="createUser">Перейти</b-button></h2>
        <h2>Ученик <b-button @click="createUser">Перейти</b-button></h2>
    </div>
</template>

<script>
export default {
    name: "createUser",
    methods: {
        createUser() {
            const date = new Date();
            const uniqueCode = date
                .toString()
                .split(" ")
                .join("")
                .split(":")
                .join("")
                .split("+")
                .join("")
                .split("(")
                .join("")
                .split(")")
                .join("")
                .split(",")
                .join("");
            const User = {
                name: "user" + uniqueCode,
                email: "user" + uniqueCode + "@email.com",
                password: "qwerty" + uniqueCode,
            }
            console.log(User);
        }
    }
}
</script>

<style scoped>

</style>
