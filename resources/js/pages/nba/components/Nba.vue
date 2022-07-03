<template>
    <div class="row">
        <div class="col-md-12">
            <router-link to="/"  class="btn btn-outline-dark float-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                </svg>
                Home
            </router-link>
            <div class="player-wrapper">
            <h1>NBA BASKETBALL</h1>
            <div class="card">
                <!-- <img src="/images/teams/allblacks.png" alt="All blacks logo" class="logo"> -->
                <div class="name">
                    <em>#{{selectedPlayer.number}}</em>
                    <h2>{{selectedPlayer.first_name}} <strong>{{selectedPlayer.last_name}} </strong></h2>
                </div>
                <div class="profile">
                    <img v-if="!loading" :src="'/images/players/nba/' + selectedPlayer?.image" alt="Aaron Smith" class="headshot">
                    <div class="features" v-if="!loading">
                        <div class="feature" v-for="feature in selectedPlayerStats.featured" :key="feature.label">
                            <h3>{{feature.label}}</h3>
                            {{feature.value}}
                        </div>
                    </div>
                </div>
                <div class="bio">
                    <div class="data">
                        <strong>Position</strong>
                        {{loading ? '...' : selectedPlayer.position}}
                    </div>
                    <div class="data">
                        <strong>Weight</strong>
                        {{loading ? '...' : selectedPlayer.weight}}
                    </div>
                    <div class="data">
                        <strong>Height</strong>
                        {{loading ? '...' : _getHeight(selectedPlayer)}}
                    </div>
                    <div class="data">
                        <strong>Age</strong>
                        {{loading ? '...' :_calculateAge(selectedPlayer.birthday)}}
                    </div>
                </div>
                <div class="menu-player">
                    <li 
                        v-for="(player, i) in playerMenu"
                        :key="player.id" :class="i === 1 ? 'active' : ''"
                        :style="i === 1 ? 'pointer-events: none' : ''"
                        @click="changeActivePlayer(player.id)"
                    >{{player.first_name}} {{player.last_name}}</li>
                </div>
            </div>

            </div>
            <div id="overlay" v-if="loading">
                <div class="w-100 d-flex justify-content-center align-items-center text-info">
                    <div class="spinner-border" role="status">
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    import axios from 'axios';
    import { onMounted, computed, ref, watch } from 'vue';
    const players = ref([]);
    const loading = ref(false)
    const selectedPlayer = ref({});
    const playerMenu = ref([]);
    const selectedPlayerStats = ref([]);

    onMounted(() => {
        getPlayers()
    });

    watch(() => selectedPlayer.value, (newSelectedPlayer) => {
        let activeKey = 0;
        const lastPlayerObj = players.value[players.value.length -1]
        playerMenu.value = [];

        const activePlayer = players.value.find((o, i) => {
            if (o.id === newSelectedPlayer.id) {
                activeKey = i
                return true; 
            }
        });

        if (activeKey === 0) {
            playerMenu.value.push(lastPlayerObj)
        } else {
            playerMenu.value.push(players.value[activeKey - 1])
        }
        
        playerMenu.value.push(newSelectedPlayer)

        if (players.value.length -1 === activeKey){
            playerMenu.value.push(players.value[0])
        } else {
            playerMenu.value.push(players.value[activeKey + 1])
        }
    })

    async function getPlayers() {
        loading.value = true;
        await axios({
            url: '/api/nba'
        })
        .then((res) => {
            players.value = res.data?.data
            selectedPlayer.value = res.data?.data[0]
            getPlayerStatsById(res.data?.data[0].id)
        });
        loading.value = false;
    }

    async function getPlayerById($id) {
        loading.value = true;
        await axios({
            url: '/api/nba/' + $id
        })
        .then((res) => {
            selectedPlayer.value = res.data?.data
        });
        loading.value = false;
    }

    async function changeActivePlayer($id) {
        await getPlayerById($id)
        await getPlayerStatsById($id)
    }

    async function getPlayerStatsById($id) {
        loading.value = true;
        await axios({
            url: '/api/nba/stats/player_id/' + $id
        })
        .then((res) => {
            console.log( res.data?.data)
            selectedPlayerStats.value = res.data?.data
        });
        loading.value = false;
    }

    function _calculateAge(birthday) {
        if(!birthday) {
            return null;
        }
        const birthdate = new Date(birthday)
        var ageDifMs = Date.now() - birthdate.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        return Math.abs(ageDate.getUTCFullYear() - 1970) + ' Years Old';
    }

    function _getHeight(selectedPlayer) { 
        return selectedPlayer.feet + "'" +selectedPlayer.inches  +'"'
    }
    
</script>

<style scoped lang="scss">
// .menu-wrapper {
//     position: relative;
// }
.menu-player{
    right: -38px;
    list-style: none;
    bottom: 0px;
    position: absolute;
    li{
        writing-mode: vertical-rl;
        text-orientation: mixed;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        padding: 8px 5px;
        background: black;
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
    }
    li.active {
            background: #DFE1E8;
            color: #000   ;
        }
}

#overlay {
  position: absolute;
  display: flex;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 100;
  height: 100%;
  width: 100%;
}
</style>