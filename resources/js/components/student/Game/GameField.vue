<template>
    <div>
        <b-card v-for="field in fieldsData">
            {{field.id}}
        </b-card>
    </div>
</template>

<script>
import GameFieldResource from "../../../resources/game_field_resource";

export default {
    name: "GameField",
    data() {
      return {
          fieldsData: null
      }
    },
    mounted() {
        this.fetchData()
    },
    methods: {

    }
}
</script>

<style scoped>

</style>
