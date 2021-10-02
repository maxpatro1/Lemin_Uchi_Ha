<template>
    <div v-if="battle">
        <b-row>
            <b-col class="first-team-header text-style d-flex align-items-center"><b>{{battle.team.name}}</b></b-col>
            <b-col class="second-team-header text-style d-flex align-items-center"><b>{{battle.second_team.name}}</b></b-col>
        </b-row>
        <b-row class="d-flex text-style justify-content-center">Статус</b-row>
        <b-row class="d-flex text-style justify-content-center">Отвечает: {{battle.second_team.name}}</b-row>
        <game-field
            :battle="battle"
            :battle-fields="battleFields"></game-field>
    </div>
</template>

<script>
import GameField from "./GameField";
import GameResource from "../../../resources/game_resource";
import GameFieldResource from "../../../resources/game_field_resource";

export default {
    name: "Game",
    components: { GameField },
    data () {
        return {
            battle: null,
            battleFields: null
        }
    },
    async mounted() {
        await this.fetchData()
    },
    methods: {
        async fetchData() {
            this.battle = await GameResource.get({
                id: this.getBattleId
            })
            this.battleFields = await GameFieldResource.fetchBattleFieldsById(this.getBattleId)
        },
    },
    computed: {
        getBattleId() {
            return this.$route.path.split('/')[2]
        }
    }

}
</script>

<style scoped>
    .first-team-header {
        background: #6568F3;
        color: #FFFFFF;
        height: 55px;
        font-weight: bold;
    }
    .text-style {
        font-size: 24px;
        line-height: 29px;
    }
    .second-team-header {
        background: #FF6C9A;
        height: 55px;
        color: #FFFFFF;
        font-weight: bold;
    }
</style>
