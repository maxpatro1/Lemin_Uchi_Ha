<template>
    <div>
        <b-card @click="openQuestionModal()" v-for="field in battleFields">
            {{field.id}}
        </b-card>
    </div>
</template>

<script>

export default {
    name: "GameField",
    props: {
        battleFields: {
            type: Object
        }
    },
    data() {
      return {
          fieldsData: null
      }
    },
    mounted() {
        console.log(this.battleFields)
    },
    methods: {
        openQuestionModal() {

        }
    }
}
</script>

<style scoped>

</style>
