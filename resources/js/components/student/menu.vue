<template>
    <div>
            <b-button @click.prevent="createGame">
                <router-link
                    v-if="battle"
                    class="routerLink"
                    :to="`/student/${battle.id}/game`">
                Создать игру
                </router-link>
            </b-button>
    </div>
</template>

<script>
import GameResource from "../../resources/game_resource";

export default {
    name: "menu",
    data () {
      return {
          battle: null
      }
    },
    methods: {
        async createGame() {
            this.battle = await GameResource.save({
                team_id: 1,
                pack_id: 17,
            })
        }
    }
}
</script>

<style scoped>

</style>
