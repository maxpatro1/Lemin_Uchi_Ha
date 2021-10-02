<template>
    <div>
        <b-button @click.prevent="initGame">
            Создать игру
        </b-button>
    </div>
</template>

<script>
import GameResource from "../../resources/game_resource";
import GameFieldResource from "../../resources/game_field_resource";

export default {
    name: "menu",
    data () {
      return {
          battle: null
      }
    },
    methods: {
        async initGame() {
            await this.createGame()
            await this.createBattleField()
        },
        async createGame() {
            this.battle = await GameResource.save({
                team_id: 1,
                pack_id: 17,
                second_team_id: 3
            })
        },
        async createBattleField() {
            if (this.battle) {
                this.battle_fields = await GameFieldResource.save({
                    battle_id: this.battle.id,
                    team_1: this.battle.team_id,
                    team_2: this.battle.second_team_id
                })
                await this.$router.push(`/student/${this.battle.id}/game`)
            }

        }
    }
}
</script>

<style scoped>

</style>
