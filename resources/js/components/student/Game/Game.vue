<template>
    <div>
        <game-field></game-field>
    </div>
</template>

<script>
import GameField from "./GameField";
import GameResource from "../../../resources/game_resource";
export default {
    name: "Game",
    components: { GameField },
    data () {
        return {
            battle: null
        }
    },
    methods: {
        async fetchData() {
            this.battle = await GameResource.get(this.getBattleId)
        }
    },
    computed: {

    }

}
</script>

<style scoped>

</style>
