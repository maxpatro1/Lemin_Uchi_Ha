<template>
    <div>
        <b-card @click="openQuestionModal()" v-for="field in battleFields">
            {{field.id}}
        </b-card>
        <b-modal></b-modal>
    </div>
</template>

<script>

export default {
    name: "GameField",
    props: {
        battleFields: {
            type: Array
        },
        battle: {

        },
    },
    data() {
      return {
          fieldsData: null
      }
    },
    methods: {
        openQuestionModal() {

        }
    }
}
</script>

<style scoped>

</style>
